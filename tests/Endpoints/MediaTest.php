<?php

declare(strict_types=1);

namespace Tests\Endpoints;

use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\DeleteRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\IndexRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\ShowRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\StoreRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media\UpdateRequest;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionId;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionJsonBody;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionStreamBody;
use MBVienasBaitas\Strapi\Client\Endpoints\Media;
use MBVienasBaitas\Strapi\Client\Http\Client;

class MediaTest extends TestCase
{
    public function testResourceListing(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('get')
            ->with('/api/upload/files', [])
            ->willReturn(['data' => []]);

        $endpoint = new Media($client);

        $request = IndexRequest::make();

        $this->assertEquals(['data' => []], $endpoint->index($request));
    }

    public function testResourceStore(): void
    {
        $resource = fopen(__FILE__, 'r');

        $stream = new Stream($resource);

        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('post')
            ->with('/api/upload', $stream, [], 'contentType')
            ->willReturn(['data' => []]);

        $endpoint = new Media($client);

        $request = StoreRequest::make(
            new OptionStreamBody($stream, 'contentType'),
        );

        $this->assertEquals(['data' => []], $endpoint->store($request));

        fclose($resource);
    }

    public function testResourceShow(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('get')
            ->with('/api/upload/files/10')
            ->willReturn(['data' => []]);

        $endpoint = new Media($client);

        $request = ShowRequest::make(new OptionId(10));

        $this->assertEquals(['data' => []], $endpoint->show($request));
    }

    public function testResourceUpdate(): void
    {
        $client = $this->createMock(Client::class);

        $client
            ->expects($this->once())
            ->method('post')
            ->with('/api/upload', ['name' => 'test'], ['id' => 10], 'application/json')
            ->willReturn(['data' => []]);

        $endpoint = new Media($client);

        $request = UpdateRequest::make(
            new OptionId(10),
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
            ->with('/api/upload/files/10', [])
            ->willReturn(['data' => []]);

        $endpoint = new Media($client);

        $request = DeleteRequest::make(new OptionId(10));

        $this->assertEquals(['data' => []], $endpoint->delete($request));
    }
}