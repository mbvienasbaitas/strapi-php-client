<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPaginationPaged;

class OptionPaginationPagedTest extends TestCase
{
    public function testAddsPaginationParamsToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionPaginationPaged(1, 20));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('pagination'));
        $this->assertEquals(['page' => 1, 'pageSize' => 20], $mutated->query()['pagination']);
    }
}
