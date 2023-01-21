<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection\UpdateRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = UpdateRequest::make(
    new OptionId(4),
    new OptionJsonBody([
        'data' => [
            'publishedAt' => (new DateTime())->format(DateTimeInterface::RFC3339),
        ],
    ]),
);

$endpoint = $client->collection('articles');

$response = $endpoint->update($request);

var_dump($response);