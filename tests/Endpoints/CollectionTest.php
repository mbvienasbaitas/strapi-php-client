<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\DeleteRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\LocalizeRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\ShowRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\StoreRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\UpdateRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionLocale;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateWildcard;
use MBVienasBaitas\Strapi\Client\Endpoints\Collection;
use MBVienasBaitas\Strapi\Client\Http\Client;

class CollectionTest extends TestCase
{
    public function testResourceListing(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('get')
            ->with('/api/pages', ['locale' => 'en'])
            ->willReturn(['data' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = IndexRequest::make(new OptionLocale('en'));

        $this->assertEquals(['data' => []], $endpoint->index($request));
    }

    public function testResourceScrollReturnsIterable(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('get')
            ->willReturn(['data' => [['data' => 1]], 'meta' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = IndexRequest::make(new OptionLocale('en'));

        $this->assertCount(1, $endpoint->scroll($request));
    }

    public function testResourceStore(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('post')
            ->with('/api/pages', ['name' => 'test'], [], 'application/json')
            ->willReturn(['data' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = StoreRequest::make(new OptionJsonBody([
            'name' => 'test',
        ]));

        $this->assertEquals(['data' => []], $endpoint->store($request));
    }

    public function testResourceShow(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('get')
            ->with('/api/pages/10', ['populate' => '*'])
            ->willReturn(['data' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = ShowRequest::make(new OptionId(10), new OptionPopulateWildcard());

        $this->assertEquals(['data' => []], $endpoint->show($request));
    }

    public function testResourceUpdate(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('put')
            ->with('/api/pages/10', ['name' => 'test'], [], 'application/json')
            ->willReturn(['data' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = UpdateRequest::make(
            new OptionJsonBody(['name' => 'test']),
            new OptionId(10),
        );

        $this->assertEquals(['data' => []], $endpoint->update($request));
    }

    public function testResourceDelete(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('delete')
            ->with('/api/pages/10', [])
            ->willReturn(['data' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = DeleteRequest::make(new OptionId(10));

        $this->assertEquals(['data' => []], $endpoint->delete($request));
    }

    public function testResourceLocalize(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('post')
            ->with('/api/pages/10/localizations', ['name' => 'test'], [], 'application/json')
            ->willReturn(['data' => []]);

        $endpoint = new Collection($client, 'pages');

        $request = LocalizeRequest::make(
            new OptionJsonBody(['name' => 'test']),
            new OptionId(10),
        );

        $this->assertEquals(['data' => []], $endpoint->localize($request));
    }
}