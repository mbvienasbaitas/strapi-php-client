<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Options;

use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPopulateDeep implements Collection\IndexRequestOption, Collection\ShowRequestOption,
                                    Single\ShowRequestOption
{
    /**
     * @param int $level How many levels deep to fetch.
     * @return void
     */
    public function __construct(protected int $level = 5)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('populate', 'deep,' . $this->level);
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionShowRequest(Collection\ShowRequest $request): Collection\ShowRequest
    {
        return $request->withQueryParam('populate', 'deep,' . $this->level);
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleShowRequest(Single\ShowRequest $request): Single\ShowRequest
    {
        return $request->withQueryParam('populate', 'deep,' . $this->level);
    }
}
