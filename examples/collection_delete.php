<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection\DeleteRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = DeleteRequest::make(
    new OptionId(1),
);

$endpoint = $client->collection('articles');

$response = $endpoint->delete($request);

var_dump($response);
