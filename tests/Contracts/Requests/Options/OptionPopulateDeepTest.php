<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateDeep;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPopulateDeepTest extends TestCase
{
    public function testAddsPopulateParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPopulateDeep(10));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals('deep,10', $mutated->query()['populate']);
    }

    public function testAddsPopulateParamToCollectionShowRequest(): void
    {
        $request = Collection\ShowRequest::make();

        $mutated = $request->options(new OptionPopulateDeep(10));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals('deep,10', $mutated->query()['populate']);
    }

    public function testAddsPopulateParamToSingleShowRequest(): void
    {
        $request = Single\ShowRequest::make();

        $mutated = $request->options(new OptionPopulateDeep(10));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals('deep,10', $mutated->query()['populate']);
    }
}
