<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Single;

interface LocalizeRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param LocalizeRequest $request
     * @return LocalizeRequest
     */
    public function applySingleLocalizeRequest(LocalizeRequest $request): LocalizeRequest;
}
