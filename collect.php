    <?php
    require_once('./vendor/autoload.php')   ;
    use MeSomb\Operation\PaymentOperation;

    $applicationKey = 'c8c6307e6b5cc13cf1adfd5c4533afa4a1070ee9';
    $accessKey = '0ac6e2be-1dfd-471f-b808-37a345f340d4';
    $secretKey = '0d7fd339-7b0f-4e8c-b07f-8dade8a3a9b5';
    $client = new PaymentOperation($applicationKey, $accessKey, $secretKey);

    $response = $client->makeCollect([
        'payer' => '696428651',
        'amount' => 1000,
        'service' => 'ORANGE',
        'country' => 'CM',
        'currency' => 'XAF',

    ]);
    var_dump($response->isOperationSuccess());
    $response->isTransactionSuccess();

    ?>
