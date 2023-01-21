<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Media\IndexRequest;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = IndexRequest::make();

$endpoint = $client->media();

$response = $endpoint->index($request);

var_dump($response);
