<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;

interface IndexRequestOption
{
    /**
     * Apply given option to request.
     *
     * @param IndexRequest $request
     * @return IndexRequest
     */
    public function applyCollectionIndexRequest(IndexRequest $request): IndexRequest;
}
