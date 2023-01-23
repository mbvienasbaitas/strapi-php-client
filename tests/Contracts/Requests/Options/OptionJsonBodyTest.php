<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Single;

class OptionJsonBodyTest extends TestCase
{
    public function testAddsJsonBodyToCollectionLocalizeRequest(): void
    {
        $request = Collection\LocalizeRequest::make();

        $mutated = $request->options(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(['name' => 'test'], $mutated->body());
        $this->assertEquals('application/json', $mutated->contentType());
    }

    public function testAddsJsonBodyToCollectionStoreRequest(): void
    {
        $request = Collection\StoreRequest::make();

        $mutated = $request->options(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(['name' => 'test'], $mutated->body());
        $this->assertEquals('application/json', $mutated->contentType());
    }

    public function testAddsJsonBodyToCollectionUpdateRequest(): void
    {
        $request = Collection\UpdateRequest::make();

        $mutated = $request->options(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(['name' => 'test'], $mutated->body());
        $this->assertEquals('application/json', $mutated->contentType());
    }

    public function testAddsJsonBodyToSingleUpdateRequest(): void
    {
        $request = Single\UpdateRequest::make();

        $mutated = $request->options(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(['name' => 'test'], $mutated->body());
        $this->assertEquals('application/json', $mutated->contentType());
    }

    public function testAddsJsonBodyToSingleLocalizeRequest(): void
    {
        $request = Single\LocalizeRequest::make();

        $mutated = $request->options(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(['name' => 'test'], $mutated->body());
        $this->assertEquals('application/json', $mutated->contentType());
    }

    public function testAddsJsonBodyToMediaUpdateRequest(): void
    {
        $request = Media\UpdateRequest::make();

        $mutated = $request->options(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals(['name' => 'test'], $mutated->body());
        $this->assertEquals('application/json', $mutated->contentType());
    }
}
