<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) die("Connection failed");

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$user_id = 'guest_' . session_id();

$sql = "UPDATE media SET views = views + 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

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