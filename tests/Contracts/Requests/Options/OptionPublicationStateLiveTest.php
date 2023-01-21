<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPublicationStateLive;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPublicationStateLiveTest extends TestCase
{
    public function testAddsPublicationStateParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPublicationStateLive());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('publicationState'));
        $this->assertEquals('live', $mutated->query()['publicationState']);
    }

    public function testAddsPublicationStateParamToSingleShowRequest(): void
    {
        $request = Single\ShowRequest::make();

        $mutated = $request->options(new OptionPublicationStateLive());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('publicationState'));
        $this->assertEquals('live', $mutated->query()['publicationState']);
    }
}
