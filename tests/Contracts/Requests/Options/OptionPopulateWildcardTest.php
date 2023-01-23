<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateDeep;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateNested;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateWildcard;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionPopulateWildcardTest extends TestCase
{
    public function testAddsPopulateParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPopulateWildcard());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals('*', $mutated->query()['populate']);
    }

    public function testAddsPopulateParamToCollectionShowRequest(): void
    {
        $request = Collection\ShowRequest::make();

        $mutated = $request->options(new OptionPopulateWildcard());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals('*', $mutated->query()['populate']);
    }

    public function testAddsPopulateParamToSingleShowRequest(): void
    {
        $request = Single\ShowRequest::make();

        $mutated = $request->options(new OptionPopulateWildcard());

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('populate'));
        $this->assertEquals('*', $mutated->query()['populate']);
    }
}
