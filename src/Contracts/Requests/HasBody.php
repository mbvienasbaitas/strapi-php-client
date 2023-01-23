<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests;

trait HasBody
{
    /**
     * Body to be sent.
     *
     * @var mixed|null
     */
    protected mixed $body = null;

    /**
     * Content type for body.
     *
     * @var string|null
     */
    protected string|null $contentType = null;

    /**
     * Set body and content type.
     *
     * @param mixed $body
     * @param string|null $contentType
     * @return static Copies and returns itself with new body and content type.
     */
    public function withBody(mixed $body, string|null $contentType = null): static
    {
        $clone = clone $this;

        $clone->body = $body;
        $clone->contentType = $contentType;

        return $clone;
    }

    /**
     * Get body.
     *
     * @return mixed
     */
    public function body(): mixed
    {
        return $this->body;
    }

    /**
     * Get body content type.
     *
     * @return string|null
     */
    public function contentType(): string|null
    {
        return $this->contentType;
    }
}
