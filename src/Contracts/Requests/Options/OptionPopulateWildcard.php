<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPopulateWildcard implements Collection\IndexRequestOption, Collection\ShowRequestOption,
                                        Single\ShowRequestOption
{
    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('populate', '*');
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionShowRequest(Collection\ShowRequest $request): Collection\ShowRequest
    {
        return $request->withQueryParam('populate', '*');
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleShowRequest(Single\ShowRequest $request): Single\ShowRequest
    {
        return $request->withQueryParam('populate', '*');
    }
}
