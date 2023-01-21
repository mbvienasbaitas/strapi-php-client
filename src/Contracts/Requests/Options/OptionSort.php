<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

class OptionSort implements Collection\IndexRequestOption
{
    /**
     * @param array $sort Sorting options.
     * @return void
     */
    public function __construct(protected array $sort)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('sort', $this->sort);
    }
}
