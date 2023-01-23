<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateNested;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPopulateNestedTest extends TestCase
{
    public function testAddsPopulateParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPopulateNested(['relation1', 'relation2']));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals(['relation1', 'relation2'], $mutated->query()['populate']);
    }

    public function testAddsPopulateParamToCollectionShowRequest(): void
    {
        $request = Collection\ShowRequest::make();

        $mutated = $request->options(new OptionPopulateNested(['relation1', 'relation2']));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals(['relation1', 'relation2'], $mutated->query()['populate']);
    }

    public function testAddsPopulateParamToSingleShowRequest(): void
    {
        $request = Single\ShowRequest::make();

        $mutated = $request->options(new OptionPopulateNested(['relation1', 'relation2']));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals(['relation1', 'relation2'], $mutated->query()['populate']);
    }
}
