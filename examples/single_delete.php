<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\DeleteRequest;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = DeleteRequest::make();

$endpoint = $client->single('layout');

$response = $endpoint->delete($request);

var_dump($response);
