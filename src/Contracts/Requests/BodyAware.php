<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests;

interface BodyAware
{
    /**
     * Get body.
     *
     * @return mixed
     */
    public function body(): mixed;

    /**
     * Get body content type.
     *
     * @return string|null
     */
    public function contentType(): string|null;
}
