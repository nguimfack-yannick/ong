<?php
header('Content-Type: application/json');
session_start();

$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]));
}

// Vérifier si l'utilisateur est administrateur (exemple avec une variable de session)
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    echo json_encode(['success' => false, 'error' => 'Accès non autorisé']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$media_id = isset($data['id']) ? intval($data['id']) : 0;

if ($media_id <= 0) {
    echo json_encode(['success' => false, 'error' => 'ID de média invalide']);
    exit;
}

// Récupérer l'URL du fichier pour le supprimer
$sql = "SELECT url FROM media WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $media_id);
$stmt->execute();
$result = $stmt->get_result();
$media = $result->fetch_assoc();

if ($media) {
    // Supprimer le fichier du dossier Uploads
    if (file_exists($media['url'])) {
        unlink($media['url']);
    }

    // Supprimer l'entrée de la table medias (les commentaires et interactions sont supprimés via ON DELETE CASCADE)
    $sql = "DELETE FROM media WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $media_id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de la suppression: ' . $stmt->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Média non trouvé']);
}

$stmt->close();
$conn->close();
?>