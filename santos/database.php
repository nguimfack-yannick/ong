<?php
// Configuration de la connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplace par ton utilisateur MySQL
$password = ""; // Remplace par ton mot de passe MySQL
$dbname = "abec_dons";


try {
    // Créer une connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurer PDO pour lancer des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configurer l'encodage UTF-8
    $conn->exec("SET NAMES utf8");
} catch (PDOException $e) { 
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Échec de la connexion à la base de données : ' . $e->getMessage()]);
    exit;
}
?>