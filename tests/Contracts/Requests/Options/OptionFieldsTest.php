<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionFields;

class OptionFieldsTest extends TestCase
{
    public function testAddsFieldsQueryParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionFields(['name', 'email']));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('fields'));
        $this->assertEquals(['name', 'email'], $mutated->query()['fields']);
    }
}
