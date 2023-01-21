<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Endpoints;

use VienasBaitas\Strapi\Client\Contracts\Endpoint;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\DeleteRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\LocalizeRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\ShowRequest;
use VienasBaitas\Strapi\Client\Contracts\Http;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\UpdateRequest;

class Single extends Endpoint
{
    /**
     * Resource name.
     *
     * @var string
     */
    protected string $resource;

    /**
     * @param Http $http
     * @param string $resource
     * @return void
     */
    public function __construct(Http $http, string $resource)
    {
        parent::__construct($http);

        $this->resource = $resource;
    }

    /**
     * {@inheritDoc}
     */
    protected function path(): string
    {
        return '/api/' . $this->resource;
    }

    /**
     * Execute show request.
     *
     * @param ShowRequest $request
     * @return mixed
     */
    public function show(ShowRequest $request): mixed
    {
        return $this->http->get(
            $this->path(),
            $request->query()
        );
    }

    /**
     * Execute update request.
     *
     * @param UpdateRequest $request
     * @return mixed
     */
    public function update(UpdateRequest $request): mixed
    {
        return $this->http->put(
            $this->path(),
            $request->body(),
            $request->query(),
            $request->contentType()
        );
    }

    /**
     * Execute delete reqeust.
     *
     * @param DeleteRequest $request
     * @return mixed
     */
    public function delete(DeleteRequest $request): mixed
    {
        return $this->http->delete(
            $this->path(),
            $request->query()
        );
    }

    /**
     * Execute localize request.
     *
     * @param LocalizeRequest $request
     * @return mixed
     */
    public function localize(LocalizeRequest $request): mixed
    {
        return $this->http->post(
            $this->path() . '/localizations',
            $request->body(),
            $request->query(),
            $request->contentType()
        );
    }
}
