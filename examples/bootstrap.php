<?php

use VienasBaitas\Strapi\Client\Client;

include __DIR__ . '/../vendor/autoload.php';

$url = 'http://localhost:1337';
$token = 'c78e765cdc49a7319cd37c6cdb538c22d09b6b9609bb5715f8446832443d6813b6f1ef28b7f4bcf95fc083b0eaf346b45edb2c011d0f4c10f2d1b271488d73529765b6a46388ce465a8efced20365d6da199ac72e064bc5c70f67c23f4cc4c173f10d17beeaeceed8e572f55a4e1f4091b21171b8db7ded05e1d0924d3323deb';

$client = new Client($url, $token);
