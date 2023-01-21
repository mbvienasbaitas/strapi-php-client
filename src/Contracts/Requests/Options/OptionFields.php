<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

class OptionFields implements Collection\IndexRequestOption
{
    /**
     * @param array $fields Fields to be fetched.
     * @return void
     */
    public function __construct(protected array $fields)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('fields', $this->fields);
    }
}
