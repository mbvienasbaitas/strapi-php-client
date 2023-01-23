<?php

use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Utils;
use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\StoreRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionStreamBody;

include __DIR__ . '/bootstrap.php';

/** @var $client Client */

$boundary = 'boundary';

$stream = new MultipartStream([
    [
        'name' => 'files',
        'contents' => Utils::tryFopen(__DIR__ . '/assets/pexels-eugene-golovesov-14139925.jpg', 'r'),
        'filename' => 'pexels-eugene-golovesov-14139925.jpg',
    ],
], $boundary);

$request = StoreRequest::make(
    new OptionStreamBody($stream, 'multipart/form-data; boundary=' . $boundary),
);

$endpoint = $client->media();

$response = $endpoint->store($request);

var_dump($response);
