<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

class OptionFilters implements Collection\IndexRequestOption
{
    /**
     * @param array $filters Filters to be set.
     * @return void
     */
    public function __construct(protected array $filters)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('filters', $this->filters);
    }
}
