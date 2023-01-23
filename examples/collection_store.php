<?php

use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\StoreRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = StoreRequest::make(
    new OptionJsonBody([
        'data' => [
            'title' => 'Sample Article',
        ],
    ]),
);

$endpoint = $client->collection('articles');

$response = $endpoint->store($request);

var_dump($response);
