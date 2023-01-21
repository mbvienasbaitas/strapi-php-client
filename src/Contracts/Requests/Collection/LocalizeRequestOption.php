<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

interface LocalizeRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param LocalizeRequest $request
     * @return LocalizeRequest
     */
    public function applyCollectionLocalizeRequest(LocalizeRequest $request): LocalizeRequest;
}
