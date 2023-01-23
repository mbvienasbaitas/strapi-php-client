<?php

use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\ShowRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$request = ShowRequest::make(
    new OptionId(3),
);

$endpoint = $client->media();

$response = $endpoint->show($request);

var_dump($response);
