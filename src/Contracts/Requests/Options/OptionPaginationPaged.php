<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

class OptionPaginationPaged implements Collection\IndexRequestOption
{
    /**
     * @param int $page
     * @param int $size
     * @return void
     */
    public function __construct(protected int $page = 1, protected int $size = 25)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('pagination', [
            'page' => $this->page,
            'pageSize' => $this->size,
        ]);
    }
}
