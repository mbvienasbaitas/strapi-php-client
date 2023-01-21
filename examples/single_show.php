<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\ShowRequest;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = ShowRequest::make();

$endpoint = $client->single('layout');

$response = $endpoint->show($request);

var_dump($response);
