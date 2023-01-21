<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests;

interface IdAware
{
    /**
     * Get resource ID.
     *
     * @return int
     */
    public function id(): int;
}
