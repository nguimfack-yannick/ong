<?php
header('Content-Type: application/json');
session_start(); // important si tu utilises session_id()
$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) die("Connection failed");

$data = json_decode(file_get_contents('php://input'), true);
$id = intval($data['id']);
$action = $data['action'];
$user_id = 'guest_' . session_id(); // à remplacer par un vrai ID utilisateur

if ($action === 'heart') {
    // Vérifier si déjà hearté
    $check = $conn->prepare("SELECT hearted FROM user_interactions WHERE user_id = ? AND media_id = ?");
    $check->bind_param("si", $user_id, $id);
    $check->execute();
    $res = $check->get_result()->fetch_assoc();

    if (!$res || $res['hearted'] == 0) {
        // Ajouter un cœur
        $sql = "UPDATE media SET hearts = hearts + 1 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $sql = "INSERT INTO user_interactions (user_id, media_id, hearted) VALUES (?, ?, TRUE)
                ON DUPLICATE KEY UPDATE hearted = TRUE";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $user_id, $id);
        $stmt->execute();
    }
} elseif ($action === 'unheart') {
    // Vérifier si déjà hearté
    $check = $conn->prepare("SELECT hearted FROM user_interactions WHERE user_id = ? AND media_id = ?");
    $check->bind_param("si", $user_id, $id);
    $check->execute();
    $res = $check->get_result()->fetch_assoc();

    if ($res && $res['hearted'] == 1) {
        // Retirer un cœur
        $sql = "UPDATE media SET hearts = GREATEST(hearts - 1, 0) WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $sql = "UPDATE user_interactions SET hearted = FALSE WHERE user_id = ? AND media_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $user_id, $id);
        $stmt->execute();
    }
}

// Récupération des données mises à jour
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

// Récupérer les commentaires
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
