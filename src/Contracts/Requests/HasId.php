<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests;

trait HasId
{
    /**
     * Resource ID.
     *
     * @var int
     */
    protected int $id;

    /**
     * Set resource ID.
     *
     * @param int $id
     * @return static Copies and returns itself with new ID.
     */
    public function withId(int $id): static
    {
        $clone = clone $this;

        $clone->id = $id;

        return $clone;
    }

    /**
     * Get resource ID.
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }
}
