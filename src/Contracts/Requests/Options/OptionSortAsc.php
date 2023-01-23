<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Options;

use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;

class OptionSortAsc implements Collection\IndexRequestOption
{
    /**
     * @param string $field Field for ascending sort.
     * @return void
     */
    public function __construct(protected string $field)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('sort', [$this->field . ':asc']);
    }
}
