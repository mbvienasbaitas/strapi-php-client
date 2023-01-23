<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Media;

interface IndexRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param IndexRequest $request
     * @return IndexRequest
     */
    public function applyMediaIndexRequest(IndexRequest $request): IndexRequest;
}
