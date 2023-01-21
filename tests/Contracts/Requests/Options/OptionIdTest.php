<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use VienasBaitas\Strapi\Client\Contracts\Requests\Media;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;

class OptionIdTest extends TestCase
{
    public function testAddsIdParamToCollectionDeleteRequest(): void
    {
        $request = Collection\DeleteRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->id());
    }

    public function testAddsIdParamToCollectionLocalizeRequest(): void
    {
        $request = Collection\LocalizeRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->id());
    }

    public function testAddsIdParamToCollectionShowRequest(): void
    {
        $request = Collection\ShowRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->id());
    }

    public function testAddsIdParamToCollectionUpdateRequest(): void
    {
        $request = Collection\UpdateRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->id());
    }

    public function testAddsIdParamToMediaShowRequest(): void
    {
        $request = Media\ShowRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->id());
    }

    public function testAddsIdParamToMediaDeleteRequest(): void
    {
        $request = Media\DeleteRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->id());
    }

    public function testAddsIdParamToMediaUpdateRequest(): void
    {
        $request = Media\UpdateRequest::make();

        $mutated = $request->options(new OptionId(10));

        $this->assertFalse($request->hasQueryParam('id'));
        $this->assertNotSame($request, $mutated);
        $this->assertEquals(10, $mutated->query()['id']);
    }
}
