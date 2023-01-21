<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionLocale;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionPopulateWildcard;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\DeleteRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\LocalizeRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\ShowRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Single\UpdateRequest;
use VienasBaitas\Strapi\Client\Endpoints\Collection;
use VienasBaitas\Strapi\Client\Endpoints\Single;
use VienasBaitas\Strapi\Client\Http\Client;

class SingleTest extends TestCase
{
    public function testResourceShow(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('get')
            ->with('/api/page', ['populate' => '*'])
            ->willReturn(['data' => []]);

        $endpoint = new Single($client, 'page');

        $request = ShowRequest::make(new OptionPopulateWildcard());

        $this->assertEquals(['data' => []], $endpoint->show($request));
    }

    public function testResourceUpdate(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('put')
            ->with('/api/page', ['name' => 'test'], [], 'application/json')
            ->willReturn(['data' => []]);

        $endpoint = new Single($client, 'page');

        $request = UpdateRequest::make(
            new OptionJsonBody(['name' => 'test']),
        );

        $this->assertEquals(['data' => []], $endpoint->update($request));
    }

    public function testResourceDelete(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('delete')
            ->with('/api/page', [])
            ->willReturn(['data' => []]);

        $endpoint = new Single($client, 'page');

        $request = DeleteRequest::make();

        $this->assertEquals(['data' => []], $endpoint->delete($request));
    }

    public function testResourceLocalize(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('post')
            ->with('/api/page/localizations', ['name' => 'test'], [], 'application/json')
            ->willReturn(['data' => []]);

        $endpoint = new Single($client, 'page');

        $request = LocalizeRequest::make(
            new OptionJsonBody(['name' => 'test']),
        );

        $this->assertEquals(['data' => []], $endpoint->localize($request));
    }
}