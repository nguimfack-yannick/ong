<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "abec_dons");
if ($conn->connect_error) die("Connection failed");

$data = json_decode(file_get_contents('php://input'), true);
$media_id = $data['media_id'];
$text = $data['text'];

$sql = "INSERT INTO comments (media_id, text) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $media_id, $text);
$stmt->execute();

$sql = "UPDATE media SET comment_count = comment_count + 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $media_id);
$stmt->execute();

$sql = "SELECT id, type, url, title, description, branch, likes, hearts, views, comment_count FROM media WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $media_id);
$stmt->execute();
$result = $stmt->get_result();
$updated = $result->fetch_assoc();

echo json_encode($updated);
$conn->close();
?>  