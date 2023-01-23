<?php

use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionLocale;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionSortAsc;

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
