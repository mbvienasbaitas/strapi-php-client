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

foreach ($endpoint->scroll($request) as $item) {
    var_dump($item);
}
