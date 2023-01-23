<?php

use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Single\LocalizeRequest;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = LocalizeRequest::make(
    new OptionJsonBody([
        'locale' => 'lt',
        'title' => '[LT] Sample',
    ]),
);

$endpoint = $client->single('layout');

$response = $endpoint->localize($request);

var_dump($response);
