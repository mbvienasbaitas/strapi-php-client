<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use MBVienasBaitas\Strapi\Client\Client;
use MBVienasBaitas\Strapi\Client\Endpoints\Collection;
use MBVienasBaitas\Strapi\Client\Endpoints\Media;
use MBVienasBaitas\Strapi\Client\Endpoints\Single;

class ClientTest extends TestCase
{
    public function testResolvesCollectionEndpoint(): void
    {
        $httpClient = $this->createMock(ClientInterface::class);

        $client = new Client('http://localhost:1337', '', $httpClient);

        $endpoint = $client->collection('pages');

        $this->assertInstanceOf(Collection::class, $endpoint);
        $this->assertSame($endpoint, $client->collection('pages'));
    }

    public function testResolvesSingleEndpoint(): void
    {
        $httpClient = $this->createMock(ClientInterface::class);

        $client = new Client('http://localhost:1337', '', $httpClient);

        $endpoint = $client->single('page');

        $this->assertInstanceOf(Single::class, $endpoint);
        $this->assertSame($endpoint, $client->single('page'));
    }

    public function testResolvesMediaEndpoint(): void
    {
        $httpClient = $this->createMock(ClientInterface::class);

        $client = new Client('http://localhost:1337', '', $httpClient);

        $endpoint = $client->media();

        $this->assertInstanceOf(Media::class, $endpoint);
        $this->assertSame($endpoint, $client->media());
    }
}
