<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) die("Connection failed");

// Simuler un user_id (à remplacer par une vraie gestion de session)
$user_id = 'guest_' . session_id();

$sql = "SELECT m.id, m.type, m.url, m.title, m.description, m.branch, m.likes, m.hearts, m.views, m.comment_count,
        ui.liked, ui.hearted
        FROM media m
        LEFT JOIN user_interactions ui ON m.id = ui.media_id AND ui.user_id = ?
        WHERE m.branch = 'Santé'
        ORDER BY m.id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$media = [];
while ($row = $result->fetch_assoc()) {
    $comment_sql = "SELECT id, text, created_at FROM comments WHERE media_id = ? ORDER BY created_at DESC";
    $comment_stmt = $conn->prepare($comment_sql);
    $comment_stmt->bind_param("i", $row['id']);
    $comment_stmt->execute();
    $comment_result = $comment_stmt->get_result();
    $row['comments'] = [];
    while ($comment = $comment_result->fetch_assoc()) {
        $row['comments'][] = $comment;
    }
    $media[] = $row;
    $comment_stmt->close();
}
$stmt->close();
$conn->close();
echo json_encode($media);
?>