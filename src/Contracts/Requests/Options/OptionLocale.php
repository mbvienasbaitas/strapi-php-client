<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Options;

use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionLocale implements Collection\IndexRequestOption, Single\ShowRequestOption, Single\UpdateRequestOption,
                              Single\DeleteRequestOption
{
    /**
     * @param string $locale Locale to be used.
     * @return void
     */
    public function __construct(protected string $locale)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionIndexRequest(Collection\IndexRequest $request): Collection\IndexRequest
    {
        return $request->withQueryParam('locale', $this->locale);
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleShowRequest(Single\ShowRequest $request): Single\ShowRequest
    {
        return $request->withQueryParam('locale', $this->locale);
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleUpdateRequest(Single\UpdateRequest $request): Single\UpdateRequest
    {
        return $request->withQueryParam('locale', $this->locale);
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleDeleteRequest(Single\DeleteRequest $request): Single\DeleteRequest
    {
        return $request->withQueryParam('locale', $this->locale);
    }
}
