<?php
header('Content-Type: application/json');
session_start();

$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]));
}

// Vérifier si l'utilisateur est administrateur
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo json_encode(['success' => false, 'error' => 'Accès non autorisé']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $media_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $branch = isset($_POST['branch']) ? $_POST['branch'] : 'Santé';

    if ($media_id <= 0 || empty($title)) {
        echo json_encode(['success' => false, 'error' => 'ID ou titre invalide']);
        exit;
    }

    // Gérer le fichier média (si fourni)
    $url = null;
    if (isset($_FILES['media']) && $_FILES['media']['size'] > 0) {
        $type = $_FILES['media']['type'];
        $type = strpos($type, 'image') !== false ? 'image' : 'video';
        $target_dir = "Uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["media"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $uploadOk = 1;
        if ($type == 'image' && !in_array($fileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo json_encode(['success' => false, 'error' => 'Seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.']);
            $uploadOk = 0;
        } elseif ($type == 'video' && !in_array($fileType, ['mp4', 'avi', 'mov'])) {
            echo json_encode(['success' => false, 'error' => 'Seuls les fichiers MP4, AVI & MOV sont autorisés.']);
            $uploadOk = 0;
        }

        if ($uploadOk && move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
            $url = $target_file;
            // Supprimer l'ancien fichier média
            $sql = "SELECT url FROM media WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $media_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $old_media = $result->fetch_assoc();
            if ($old_media && file_exists($old_media['url'])) {
                unlink($old_media['url']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'upload.']);
            exit;
        }
    }

    // Mettre à jour les données
    if ($url) {
        $sql = "UPDATE media SET title = ?, description = ?, branch = ?, type = ?, url = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $title, $description, $branch, $type, $url, $media_id);
    } else {
        $sql = "UPDATE medias SET title = ?, description = ?, branch = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $title, $description, $branch, $media_id);
    }

    if ($stmt->execute()) {
        // Récupérer les données mises à jour
        $sql = "SELECT id, type, url, title, description, branch, likes, hearts, views, comment_count FROM medias WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $media_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $media = $result->fetch_assoc();
        echo json_encode(['success' => true, 'media' => $media]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de la mise à jour: ' . $stmt->error]);
    }

    $stmt->close();
}
$conn->close();
?>