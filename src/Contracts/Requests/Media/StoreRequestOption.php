<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Media;

interface StoreRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param StoreRequest $request
     * @return StoreRequest
     */
    public function applyMediaStoreRequest(StoreRequest $request): StoreRequest;
}
