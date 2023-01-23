<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Options;

use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media;

class OptionId implements Collection\ShowRequestOption, Collection\UpdateRequestOption, Collection\DeleteRequestOption,
                          Collection\LocalizeRequestOption, Media\ShowRequestOption, Media\DeleteRequestOption,
                          Media\UpdateRequestOption
{
    /**
     * @param int $id Resource ID.
     * @return void
     */
    public function __construct(protected int $id)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionDeleteRequest(Collection\DeleteRequest $request): Collection\DeleteRequest
    {
        return $request->withId($this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionLocalizeRequest(Collection\LocalizeRequest $request): Collection\LocalizeRequest
    {
        return $request->withId($this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionShowRequest(Collection\ShowRequest $request): Collection\ShowRequest
    {
        return $request->withId($this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function applyCollectionUpdateRequest(Collection\UpdateRequest $request): Collection\UpdateRequest
    {
        return $request->withId($this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function applyMediaShowRequest(Media\ShowRequest $request): Media\ShowRequest
    {
        return $request->withId($this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function applyMediaDeleteRequest(Media\DeleteRequest $request): Media\DeleteRequest
    {
        return $request->withId($this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function applyMediaUpdateRequest(Media\UpdateRequest $request): Media\UpdateRequest
    {
        return $request->withQueryParam('id', $this->id);
    }
}
