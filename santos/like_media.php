<?php
header('Content-Type: application/json');
session_start();
$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) die("Connection failed");

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$action = $data['action'];

// Id utilisateur (à remplacer par ta vraie gestion de login)
$user_id = 'guest_' . session_id();

// Vérifier si l'utilisateur a déjà liké
$check = $conn->prepare("SELECT liked FROM user_interactions WHERE user_id = ? AND media_id = ?");
$check->bind_param("si", $user_id, $id);
$check->execute();
$result = $check->get_result();
$interaction = $result->fetch_assoc();

if ($action === 'like') {
    if (!$interaction || !$interaction['liked']) {
        // Incrémente seulement si pas encore liké
        $sql = "UPDATE media SET likes = likes + 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $sql = "INSERT INTO user_interactions (user_id, media_id, liked) 
                VALUES (?, ?, TRUE)
                ON DUPLICATE KEY UPDATE liked = TRUE";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $user_id, $id);
        $stmt->execute();
    }
} elseif ($action === 'unlike') {
    if ($interaction && $interaction['liked']) {
        // Décrémente seulement si déjà liké
        $sql = "UPDATE media SET likes = GREATEST(likes - 1, 0) WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $sql = "UPDATE user_interactions SET liked = FALSE WHERE user_id = ? AND media_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $user_id, $id);
        $stmt->execute();
    }
}

// Récupération des infos mises à jour
$sql = "SELECT m.id, m.type, m.url, m.title, m.description, m.branch, m.likes, m.hearts, m.views, m.comment_count,
        ui.liked, ui.hearted
        FROM media m
        LEFT JOIN user_interactions ui ON m.id = ui.media_id AND ui.user_id = ?
        WHERE m.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $user_id, $id);
$stmt->execute();
$result = $stmt->get_result();
$updated = $result->fetch_assoc();

// Récupération des commentaires
$comment_sql = "SELECT id, text, created_at FROM comments WHERE media_id = ? ORDER BY created_at DESC";
$comment_stmt = $conn->prepare($comment_sql);
$comment_stmt->bind_param("i", $id);
$comment_stmt->execute();
$comment_result = $comment_stmt->get_result();
$updated['comments'] = [];
while ($comment = $comment_result->fetch_assoc()) {
    $updated['comments'][] = $comment;
}
$comment_stmt->close();

$stmt->close();
$conn->close();

echo json_encode($updated);
?>
