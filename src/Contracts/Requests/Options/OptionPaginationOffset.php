<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

class OptionPaginationOffset implements Collection\IndexRequestOption
{
    /**
     * @param int $start Offset start.
     * @param int $limit Number of entries.
     * @return void
     */
    public function __construct(protected int $start = 0, protected int $limit = 25)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('pagination', [
            'start' => $this->start,
            'limit' => $this->limit,
        ]);
    }
}
