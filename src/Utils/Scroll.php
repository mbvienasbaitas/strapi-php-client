<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Utils;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPaginationPaged;
use VienasBaitas\Strapi\Client\Endpoints\Collection;

class Scroll
{
    /**
     * Default number of items per page.
     */
    public const PER_PAGE = 100;

    /**
     * Strapi collection endpoint instance.
     *
     * @var Collection
     */
    protected Collection $endpoint;

    /**
     * Base request to be used for scrolling.
     *
     * @var IndexRequest
     */
    protected IndexRequest $request;

    /**
     * Create new collection scroll instance.
     *
     * @param Collection $endpoint
     * @return void
     */
    public function __construct(Collection $endpoint)
    {
        $this->endpoint = $endpoint;
        $this->request = IndexRequest::make(new OptionPaginationPaged(1, self::PER_PAGE));
    }

    /**
     * Set base request for scrolling.
     *
     * @param IndexRequest $request
     * @return static
     */
    public function request(IndexRequest $request): static
    {
        $clone = clone $this;

        $clone->request = $request;

        return $clone;
    }

    /**
     * Execute resource scrolling.
     *
     * @return iterable
     */
    public function scroll(): iterable
    {
        $next = 1;

        do {
            $request = $this->request->options(new OptionPaginationPaged($next, self::PER_PAGE));

            $response = $this->endpoint->index($request);

            foreach ($response['data'] as $item) {
                yield [
                    'data' => $item,
                    'meta' => $response['meta'],
                ];
            }

            $next = $next + 1;
        } while (count($response['data']) >= self::PER_PAGE);
    }
}
