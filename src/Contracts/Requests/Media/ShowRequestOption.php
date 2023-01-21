<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Media;

interface ShowRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param ShowRequest $request
     * @return ShowRequest
     */
    public function applyMediaShowRequest(ShowRequest $request): ShowRequest;
}
