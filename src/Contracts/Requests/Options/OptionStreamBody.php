<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Options;

use VienasBaitas\Strapi\Client\Contracts\Requests\Media;
use Psr\Http\Message\StreamInterface;

class OptionStreamBody implements Media\StoreRequestOption
{

    /**
     * @param StreamInterface $stream Stream body.
     * @param string $contentType Body content type.
     * @return void
     */
    public function __construct(protected StreamInterface $stream, protected string $contentType)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function applyMediaStoreRequest(Media\StoreRequest $request): Media\StoreRequest
    {
        return $request->withBody($this->stream, $this->contentType);
    }
}
