<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionLocale;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionLocaleTest extends TestCase
{
    public function testAddsLocaleParamToCollectionIndexRequest(): void
    {
        $request = Collection\IndexRequest::make();

        $mutated = $request->options(new OptionLocale('en'));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('locale'));
        $this->assertEquals('en', $mutated->query()['locale']);
    }

    public function testAddsLocaleParamToSingleShowRequest(): void
    {
        $request = Single\ShowRequest::make();

        $mutated = $request->options(new OptionLocale('en'));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('locale'));
        $this->assertEquals('en', $mutated->query()['locale']);
    }

    public function testAddsLocaleParamToSingleUpdateRequest(): void
    {
        $request = Single\UpdateRequest::make();

        $mutated = $request->options(new OptionLocale('en'));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('locale'));
        $this->assertEquals('en', $mutated->query()['locale']);
    }

    public function testAddsLocaleParamToSingleDeleteRequest(): void
    {
        $request = Single\DeleteRequest::make();

        $mutated = $request->options(new OptionLocale('en'));

        $this->assertNotSame($request, $mutated);
        $this->assertFalse($request->hasQueryParam('locale'));
        $this->assertEquals('en', $mutated->query()['locale']);
    }
}
