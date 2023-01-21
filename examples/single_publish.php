<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\UpdateRequest;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = UpdateRequest::make(
    new OptionJsonBody([
        'data' => [
            'publishedAt' => (new DateTime())->format(DateTimeInterface::RFC3339),
        ],
    ]),
);

$endpoint = $client->single('layout');

$response = $endpoint->update($request);

var_dump($response);
