<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client;

use VienasBaitas\Strapi\Client\Contracts\Http;
use VienasBaitas\Strapi\Client\Http\Client as HttpClient;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class Client
{
    private Http $http;

    /**
     * @var array|Endpoints\Collection[]
     */
    private array $collections = [];

    /**
     * @var array|Endpoints\Single[]
     */
    private array $singles = [];

    private Endpoints\Media|null $media = null;

    public function __construct(
        string $url,
        string $token,
        ClientInterface|null $client = null,
        RequestFactoryInterface|null $requestFactory = null
    ) {
        $this->http = new HttpClient($url, $token, $client, $requestFactory);
    }

    /**
     * Get collection resource endpoint.
     *
     * @param string $resource
     * @return Endpoints\Collection
     */
    public function collection(string $resource): Endpoints\Collection
    {
        if (!isset($this->collections[$resource])) {
            $this->collections[$resource] = new Endpoints\Collection($this->http, $resource);
        }

        return $this->collections[$resource];
    }

    /**
     * Get single resource endpoint.
     *
     * @param string $resource
     * @return Endpoints\Single
     */
    public function single(string $resource): Endpoints\Single
    {
        if (!isset($this->singles[$resource])) {
            $this->singles[$resource] = new Endpoints\Single($this->http, $resource);
        }

        return $this->singles[$resource];
    }

    /**
     * Get media endpoint.
     *
     * @return Endpoints\Media
     */
    public function media(): Endpoints\Media
    {
        if (is_null($this->media)) {
            $this->media = new Endpoints\Media($this->http);
        }

        return $this->media;
    }
}
