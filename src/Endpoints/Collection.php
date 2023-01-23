<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Endpoints;

use MBVienasBaitas\Strapi\Client\Contracts\Endpoint;
use MBVienasBaitas\Strapi\Client\Contracts\Http;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\DeleteRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\LocalizeRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\ShowRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\StoreRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\UpdateRequest;
use MBVienasBaitas\Strapi\Client\Utils\Scroll;

class Collection extends Endpoint
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
     * Execute index request.
     *
     * @param IndexRequest $request
     * @return mixed
     */
    public function index(IndexRequest $request): mixed
    {
        return $this->http->get(
            $this->path(),
            $request->query()
        );
    }

    /**
     * Execute resource scrolling requests.
     *
     * @param IndexRequest $request
     * @return iterable
     */
    public function scroll(IndexRequest $request): iterable
    {
        $scroll = new Scroll($this);

        foreach ($scroll->request($request)->scroll() as $item) {
            yield $item;
        }
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
            $this->path() . '/' . $request->id(),
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
            $this->path() . '/' . $request->id(),
            $request->body(),
            $request->query(),
            $request->contentType()
        );
    }

    /**
     * Execute delete request.
     *
     * @param DeleteRequest $request
     * @return mixed
     */
    public function delete(DeleteRequest $request): mixed
    {
        return $this->http->delete(
            $this->path() . '/' . $request->id(),
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
            $this->path() . '/' . $request->id() . '/localizations',
            $request->body(),
            $request->query(),
            $request->contentType()
        );
    }
}
