<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Media;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionJsonBody implements Collection\StoreRequestOption, Collection\UpdateRequestOption,
                                Collection\LocalizeRequestOption, Single\UpdateRequestOption,
                                Single\LocalizeRequestOption, Media\UpdateRequestOption
{
    /**
     * JSON body as array.
     *
     * @param array $body
     * @return void
     */
    public function __construct(protected array $body)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionLocalizeRequest(Collection\LocalizeRequest $request): Collection\LocalizeRequest
    {
        return $request->withBody($this->body, 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionStoreRequest(Collection\StoreRequest $request): Collection\StoreRequest
    {
        return $request->withBody($this->body, 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionUpdateRequest(Collection\UpdateRequest $request): Collection\UpdateRequest
    {
        return $request->withBody($this->body, 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleUpdateRequest(Single\UpdateRequest $request): Single\UpdateRequest
    {
        return $request->withBody($this->body, 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function applySingleLocalizeRequest(Single\LocalizeRequest $request): Single\LocalizeRequest
    {
        return $request->withBody($this->body, 'application/json');
    }

    /**
     * {@inheritDoc}
     */
    public function applyMediaUpdateRequest(Media\UpdateRequest $request): Media\UpdateRequest
    {
        return $request->withBody($this->body, 'application/json');
    }
}
