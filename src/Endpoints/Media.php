<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Endpoints;

use MBVienasBaitas\Strapi\Client\Contracts\Endpoint;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\DeleteRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\IndexRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\ShowRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\StoreRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\UpdateRequest;

class Media extends Endpoint
{
    /**
     * {@inheritDoc}
     */
    protected function path(): string
    {
        return '/api/upload';
    }

    /**
     * Execute index request.
     *
     * @param IndexRequest $request
     * @return mixed
     */
    public function index(IndexRequest $request): mixed
    {
        return $this->http->get(
            $this->path() . '/files',
            $request->query()
        );
    }

    /**
     * Execute store request.
     *
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request): mixed
    {
        return $this->http->post(
            $this->path(),
            $request->body(),
            $request->query(),
            $request->contentType()
        );
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
            $this->path() . '/files/' . $request->id(),
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
        return $this->http->post(
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
            $this->path() . '/files/' . $request->id(),
            $request->query()
        );
    }
}
