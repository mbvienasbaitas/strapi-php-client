<?php

use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionLocale;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionSortAsc;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = IndexRequest::make(
    new OptionLocale('en'),
    new OptionSortAsc('title'),
);

$endpoint = $client->collection('articles');

$response = $endpoint->index($request);

var_dump($response);
