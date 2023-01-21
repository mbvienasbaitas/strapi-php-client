<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPublicationStatePreview;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPublicationStatePreviewTest extends TestCase
{
    public function testAddsPublicationStateParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPublicationStatePreview());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('publicationState'));
        $this->assertEquals('preview', $mutated->query()['publicationState']);
    }

    public function testAddsPublicationStateParamToSingleShowRequest(): void
    {
        $request = Single\ShowRequest::make();

        $mutated = $request->options(new OptionPublicationStatePreview());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('publicationState'));
        $this->assertEquals('preview', $mutated->query()['publicationState']);
    }
}
