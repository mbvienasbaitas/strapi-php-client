<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionFilters;

class OptionFiltersTest extends TestCase
{
    public function testAddsFiltersQueryParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionFilters(['name' => ['$eq' => 'test']]));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('filters'));
        $this->assertEquals(['name' => ['$eq' => 'test']], $mutated->query()['filters']);
    }
}
