    <?php
    header('Content-Type: application/json');
    $conn = new mysqli("localhost", "root", "", "abec_dons");
    if ($conn->connect_error) die("Connection failed");

    $sql = "SELECT SUM(views) as views, SUM(likes) as likes, SUM(comment_count) as comments FROM media";
    $result = $conn->query($sql);
    $stats = $result->fetch_assoc();
    echo json_encode($stats);
    $conn->close();
    ?>