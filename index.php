<?php
require_once(__DIR__ . '/vendor/autoload.php');

$credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', "YOUR_API_KEY");
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);

$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
    'subject' => 'from the PHP SDK!',
    'sender' => ['name' => 'Barkachange', 'email' => 'SENDER_EMAIL'],
    'replyTo' => ['name' => 'Barkachange', 'email' => 'REPLY_EMAIL'],
    'to' => [[ 'name' => 'Malcom X', 'email' => 'RECEIVER_EMAIL']],
    'htmlContent' => '<html><body><h1>Bienvenue {{params.name}} !!! Nous avons beaucoup a realiser.</h1></body></html>',
    'params' => ['bodyMessage' => 'made just for you!','name'=>'Malcom X']
]);

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage(),PHP_EOL;
}