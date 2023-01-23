<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;

interface ShowRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param ShowRequest $request
     * @return ShowRequest
     */
    public function applyCollectionShowRequest(ShowRequest $request): ShowRequest;
}
