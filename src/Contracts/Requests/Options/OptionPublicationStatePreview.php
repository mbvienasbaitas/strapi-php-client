<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPublicationStatePreview implements Collection\IndexRequestOption, Single\ShowRequestOption
{
    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('publicationState', 'preview');
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleShowRequest(Single\ShowRequest $request): Single\ShowRequest
    {
        return $request->withQueryParam('publicationState', 'preview');
    }
}
