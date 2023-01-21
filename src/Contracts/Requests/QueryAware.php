<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests;

interface QueryAware
{
    /**
     * Get query params.
     *
     * @return array
     */
    public function query(): array;
}
