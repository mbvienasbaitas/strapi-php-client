<?php

use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\LocalizeRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = LocalizeRequest::make(
    new OptionId(4),
    new OptionJsonBody([
        'locale' => 'lt',
        'title' => 'LT Sample Article',
    ]),
);

$endpoint = $client->collection('articles');

$response = $endpoint->localize($request);

var_dump($response);
