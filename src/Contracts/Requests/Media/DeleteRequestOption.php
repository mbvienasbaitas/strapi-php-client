<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Media;

interface DeleteRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param DeleteRequest $request
     * @return DeleteRequest
     */
    public function applyMediaDeleteRequest(DeleteRequest $request): DeleteRequest;
}
