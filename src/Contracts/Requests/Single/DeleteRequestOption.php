<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Single;

interface DeleteRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param DeleteRequest $request
     * @return DeleteRequest
     */
    public function applySingleDeleteRequest(DeleteRequest $request): DeleteRequest;
}
