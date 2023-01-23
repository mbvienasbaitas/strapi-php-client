<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionSortAsc;

class OptionSortAscTest extends TestCase
{
    public function testAddsSortParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionSortAsc('name'));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('sort'));
        $this->assertEquals(['name:asc'], $mutated->query()['sort']);
    }
}
