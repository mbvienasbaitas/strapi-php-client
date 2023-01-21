<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts;

abstract class Endpoint
{
    /**
     * @param Http $http Http instance.
     * @return void
     */
    public function __construct(protected Http $http)
    {
    }

    /**
     * Return base path to an endpoint.
     *
     * @return string
     */
    abstract protected function path(): string;
}
