<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

interface StoreRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param StoreRequest $request
     * @return StoreRequest
     */
    public function applyCollectionStoreRequest(StoreRequest $request): StoreRequest;
}
