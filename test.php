<?php

require __DIR__ . '/vendor/autoload.php';

use LinghitAi\PlatformPhpSdk\HandClient;

$client = new HandClient("ba8215ca-fe29-4026-bd9c-40ef55fe690b", "214dd665efab18fec23af4421f75da5f");

$url = "https://uploadzxcs.ggwan.com/image/dashuju-oss/82687a215a60ec-512x682.jpg";

$res = $client->handRecognitionByUrl($url,15);

echo $res;






