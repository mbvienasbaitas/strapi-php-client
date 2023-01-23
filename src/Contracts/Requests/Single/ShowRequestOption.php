<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Single;

interface ShowRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param ShowRequest $request
     * @return ShowRequest
     */
    public function applySingleShowRequest(ShowRequest $request): ShowRequest;
}
