<?php

use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\UpdateRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = UpdateRequest::make(
    new OptionId(3),
    new OptionJsonBody([
        'fileInfo' => [
            'alternativeText' => 'Custom ALT',
        ],
    ]),
);

$endpoint = $client->media();

$response = $endpoint->update($request);

var_dump($response);
