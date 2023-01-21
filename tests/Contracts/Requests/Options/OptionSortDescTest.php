<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionSortDesc;

class OptionSortDescTest extends TestCase
{
    public function testAddsSortParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionSortDesc('name'));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('sort'));
        $this->assertEquals(['name:desc'], $mutated->query()['sort']);
    }
}