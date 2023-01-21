<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\LocalizeRequest;

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
