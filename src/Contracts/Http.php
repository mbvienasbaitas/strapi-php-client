<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts;

interface Http
{
    /**
     * Execute GET request.
     *
     * @param string $path
     * @param array $query
     * @return mixed
     */
    public function get(string $path, array $query = []): mixed;

    /**
     * Execute POST request.
     *
     * @param string $path
     * @param mixed|null $body
     * @param array $query
     * @param string|null $contentType
     * @return mixed
     */
    public function post(string $path, mixed $body = null, array $query = [], string|null $contentType = null): mixed;

    /**
     * Execute PUT request.
     *
     * @param string $path
     * @param mixed|null $body
     * @param array $query
     * @param string|null $contentType
     * @return mixed
     */
    public function put(string $path, mixed $body = null, array $query = [], string|null $contentType = null): mixed;

    /**
     * Execute DELETE request.
     *
     * @param string $path
     * @param array $query
     * @return mixed
     */
    public function delete(string $path, array $query = []): mixed;
}
