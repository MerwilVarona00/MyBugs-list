<?php
@include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
define('TOKEN', 'bzETgoyfAUAGJnPkqa3_OGQpZ9D_3E3Z');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$headers = [
  'Authorization' => TOKEN,
  'Content-Type' => 'application/json'
];
$body = '{
  "text": "varona.merwil@auf.edu.ph",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', MANTISHUB_URL . 'api/rest/issues/9/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();