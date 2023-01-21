<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPaginationOffset;

class OptionPaginationOffsetTest extends TestCase
{
    public function testAddsPaginationParamsToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPaginationOffset(10, 20));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('pagination'));
        $this->assertEquals(['start' => 10, 'limit' => 20], $mutated->query()['pagination']);
    }
}
