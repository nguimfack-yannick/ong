<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $branch = $_POST['branch'];
    $type = $_FILES['media']['type'];
    $type = strpos($type, 'image') !== false ? 'image' : 'video';

    $target_dir = "Uploads/";
    if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
    $target_file = $target_dir . basename($_FILES["media"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $uploadOk = 1;
    if ($type == 'image' && !in_array($fileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo json_encode(['success' => false, 'error' => 'Seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.']);
        $uploadOk = 0;
    } elseif (in_array($type, ['video/mp4', 'video/avi', 'video/mov']) && !in_array($fileType, ['mp4', 'avi', 'mov'])) {
        echo json_encode(['success' => false, 'error' => 'Seuls les fichiers MP4, AVI & MOV sont autorisés.']);
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
        $url = $target_file;
        $sql = "INSERT INTO media (type, url, title, description, branch, likes, hearts, views, comment_count) VALUES (?, ?, ?, ?, ?, 0, 0, 0, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $type, $url, $title, $description, $branch);
        if ($stmt->execute()) {
            $media_id = $conn->insert_id;
            $sql = "SELECT * FROM media WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $media_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $media = $result->fetch_assoc();
            echo json_encode(['success' => true, 'media' => $media]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'ajout en base: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'upload.']);
    }
}
$conn->close();
?>

