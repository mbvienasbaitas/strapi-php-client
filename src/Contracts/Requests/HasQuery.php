<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests;

trait HasQuery
{
    /**
     * Query params.
     *
     * @var array
     */
    protected array $query = [];

    /**
     * Set query params.
     *
     * @param array $query
     * @return static Copies and returns itself with new query params.
     */
    public function withQuery(array $query): static
    {
        $clone = clone $this;

        $clone->query = $query;

        return $clone;
    }

    /**
     * Set query param for key.
     *
     * @param string $key
     * @param mixed $value
     * @return static Copies and returns itself with new query param.
     */
    public function withQueryParam(string $key, mixed $value): static
    {
        $query = $this->query;
        $query[$key] = $value;

        return $this->withQuery($query);
    }

    /**
     * Determine if query has given param.
     *
     * @param string $key
     * @return bool
     */
    public function hasQueryParam(string $key): bool
    {
        return array_key_exists($key, $this->query);
    }

    /**
     * Get query params.
     *
     * @return array
     */
    public function query(): array
    {
        return $this->query;
    }
}
