<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Single;

interface UpdateRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param UpdateRequest $request
     * @return UpdateRequest
     */
    public function applySingleUpdateRequest(UpdateRequest $request): UpdateRequest;
}
