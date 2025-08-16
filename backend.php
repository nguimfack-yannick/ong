<?php
require_once 'database.php';
require_once './vendor/autoload.php';

use MeSomb\Operation\PaymentOperation;

header('Content-Type: application/json');

$applicationKey = 'c8c6307e6b5cc13cf1adfd5c4533afa4a1070ee9';
$accessKey = '0ac6e2be-1dfd-471f-b808-37a345f340d4';
$secretKey = '0d7fd339-7b0f-4e8c-b07f-8dade8a3a9b5';
$client = new PaymentOperation($applicationKey, $accessKey, $secretKey);

// Refuser les requêtes non POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
    exit;
}

// Nettoyage
$nature = htmlspecialchars($_POST['nature'] ?? '');
$montant = isset($_POST['amount']) && $_POST['amount'] !== '' ? floatval($_POST['amount']) : null;
$donateur = htmlspecialchars($_POST['name'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$branche = htmlspecialchars($_POST['branch'] ?? '');
$commentaire = htmlspecialchars($_POST['comment'] ?? '');
$phone = preg_replace('/[^0-9]/', '', $_POST['phone'] ?? '');
$service = strtoupper(trim($_POST['service'] ?? ''));
$date_don = date('Y-m-d');

list($country, $currency) = explode('|', $_POST['country_currency'] ?? '|');

// Champs requis
if (empty($nature) || empty($donateur) || empty($email) || empty($branche)) {
    echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs obligatoires.']);
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Adresse e-mail invalide.']);
    exit;
}

// Paiement si don financier
if ($nature === 'Financier') {
    if ($montant === null || $montant <= 0) {
        echo json_encode(['success' => false, 'message' => 'Veuillez entrer un montant valide.']);
        exit;
    }
    if (empty($phone) || empty($service)) {
        echo json_encode(['success' => false, 'message' => 'Veuillez entrer le numéro de téléphone et le service.']);
        exit;
    }

    try {
        $response = $client->makeCollect([
            'payer' => $phone,
            'amount' => $montant,
            'service' => $service,
            'country' => $country,
            'currency' => $currency,
        ]);

        if (!$response->isOperationSuccess()) {
            echo json_encode(['success' => false, 'message' => 'Échec du paiement. Vérifiez votre solde ou réessayez.']);
            exit;
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors du paiement : ' . $e->getMessage()]);
        exit;
    }
}

// Insertion dans la BDD
try {
    $stmt = $conn->prepare("SELECT id FROM branches WHERE nom = :name");
    $stmt->bindParam(':name', $branche);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Branche invalide.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO dons (
        nature, country_code, currency_code, phone, montant,
        donateur, email, date_don, branche, commentaire, statut, service
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $statut = 'success';

    $success = $stmt->execute([
        $nature,
        $country,
        $currency,
        $phone,
        $montant,
        $donateur,
        $email,
        $date_don,
        $branche,
        $commentaire,
        $statut,
        $service
    ]);

    if ($success) {
        echo json_encode(['success' => true, 'message' => 'Don enregistré avec succès.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l’enregistrement.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
} finally {
    $conn = null;
}
;