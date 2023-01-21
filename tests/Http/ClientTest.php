<?php

declare(strict_types=1);

namespace Tests\Http;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use VienasBaitas\Strapi\Client\Exceptions\ApiException;
use VienasBaitas\Strapi\Client\Exceptions\CommunicationException;
use VienasBaitas\Strapi\Client\Exceptions\InvalidResponseBodyException;
use VienasBaitas\Strapi\Client\Exceptions\JsonDecodingException;
use VienasBaitas\Strapi\Client\Exceptions\JsonEncodingException;
use VienasBaitas\Strapi\Client\Http\Client;

class ClientTest extends TestCase
{
    public function testGetExecutesRequest(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');

        $client = new Client('https://localhost:1337', '', $httpClient);
        $result = $client->get('/');

        $this->assertSame([], $result);
    }

    public function testPostExecutesRequest(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');

        $client = new Client('https://localhost:1337', '', $httpClient);
        $result = $client->post('/');

        $this->assertSame([], $result);
    }

    public function testPostExecutesRequestWithCustomStreamFactory(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');
        $streamFactory = $this->createMock(StreamFactoryInterface::class);
        $streamFactory->expects($this->atLeastOnce())->method('createStream');

        $client = new Client('https://localhost:1337', '', $httpClient, null, $streamFactory);
        $result = $client->post('/', '{}');

        $this->assertSame([], $result);
    }

    public function testPostExecutesRequestWithCustomStreamBody(): void
    {
        $stream = $this->createMock(StreamInterface::class);

        $request = $this->createMock(RequestInterface::class);
        $request
            ->expects($this->once())
            ->method('withBody')
            ->with($stream)
            ->willReturn($request);
        $request
            ->expects($this->exactly(3))
            ->method('withAddedHeader')
            ->withConsecutive(
                ['Content-Type', 'custom'],
                ['Accept', 'application/json'],
                ['Authorization', 'Bearer token'],
            )
            ->willReturn($request);

        $httpClient = $this->createHttpClientMock(200, '{}');

        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory
            ->expects($this->once())
            ->method('createRequest')
            ->willReturn($request);

        $client = new Client('https://localhost:1337', 'token', $httpClient, $requestFactory);
        $result = $client->post('/', $stream, [], 'custom');

        $this->assertSame([], $result);
    }

    public function testPostExecutesRequestWithGivenContentType(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');

        $client = new Client('https://localhost:1337', '', $httpClient);
        $result = $client->post('/', '{}', [], 'application/json');

        $this->assertSame([], $result);
    }

    public function testPostThrowsWithInvalidBody(): void
    {
        $client = new Client('https://localhost:1337', '');

        $this->expectException(JsonEncodingException::class);

        $client->post('/', "{'Bad JSON':\xB1\x31}");
    }

    public function testPostThrowsWithInvalidResponse(): void
    {
        $httpClient = $this->createHttpClientMock();

        $client = new Client('https://localhost', '', $httpClient);

        $this->expectException(JsonDecodingException::class);

        $client->post('/', '');
    }

    public function testPostThrowsInvalidResponseBodyException(): void
    {
        $httpClient = $this->createHttpClientMock(300, 'string', 'text/xml');

        $client = new Client('https://localhost:1337', '', $httpClient);

        $this->expectException(InvalidResponseBodyException::class);

        $client->post('/', '');
    }

    public function testPostThrowsApiException(): void
    {
        try {
            $httpClient = $this->createHttpClientMock(
                400,
                '{"data":null,"error":{"status":400,"name":"ValidationError","message":"Missing \"data\" payload in the request body","details":{}}}'
            );

            $client = new Client('https://localhost:1337', '', $httpClient);

            $client->post('/', '');

            $this->fail('ApiException not raised.');
        } catch (ApiException $e) {
            $this->assertEquals(400, $e->httpStatus);
            $this->assertEquals('ValidationError', $e->errorType);
        }
    }

    public function testPutExecutesRequest(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');

        $client = new Client('https://localhost:1337', '', $httpClient);
        $result = $client->put('/');

        $this->assertSame([], $result);
    }

    public function testPutExecutesRequestWithCustomStreamFactory(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');
        $streamFactory = $this->createMock(StreamFactoryInterface::class);
        $streamFactory->expects($this->atLeastOnce())->method('createStream');

        $client = new Client('https://localhost:1337', '', $httpClient, null, $streamFactory);
        $result = $client->put('/', '{}');

        $this->assertSame([], $result);
    }

    public function testPutExecutesRequestWithCustomStreamBody(): void
    {
        $stream = $this->createMock(StreamInterface::class);

        $request = $this->createMock(RequestInterface::class);
        $request
            ->expects($this->once())
            ->method('withBody')
            ->with($stream)
            ->willReturn($request);
        $request
            ->expects($this->exactly(3))
            ->method('withAddedHeader')
            ->withConsecutive(
                ['Content-Type', 'custom'],
                ['Accept', 'application/json'],
                ['Authorization', 'Bearer token'],
            )
            ->willReturn($request);

        $httpClient = $this->createHttpClientMock(200, '{}');

        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory
            ->expects($this->once())
            ->method('createRequest')
            ->willReturn($request);

        $client = new Client('https://localhost:1337', 'token', $httpClient, $requestFactory);
        $result = $client->put('/', $stream, [], 'custom');

        $this->assertSame([], $result);
    }

    public function testPutExecutesRequestWithGivenContentType(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');

        $client = new Client('https://localhost:1337', '', $httpClient);
        $result = $client->put('/', '{}', [], 'application/json');

        $this->assertSame([], $result);
    }

    public function testPutThrowsWithInvalidBody(): void
    {
        $client = new Client('https://localhost:1337', '');

        $this->expectException(JsonEncodingException::class);

        $client->put('/', "{'Bad JSON':\xB1\x31}");
    }

    public function testPutThrowsWithInvalidResponse(): void
    {
        $httpClient = $this->createHttpClientMock();

        $client = new Client('https://localhost', '', $httpClient);

        $this->expectException(JsonDecodingException::class);

        $client->put('/', '');
    }

    public function testPutThrowsInvalidResponseBodyException(): void
    {
        $httpClient = $this->createHttpClientMock(300, 'string', 'text/xml');

        $client = new Client('https://localhost:1337', '', $httpClient);

        $this->expectException(InvalidResponseBodyException::class);

        $client->put('/', '');
    }

    public function testPutThrowsApiException(): void
    {
        try {
            $httpClient = $this->createHttpClientMock(
                400,
                '{"data":null,"error":{"status":400,"name":"ValidationError","message":"Missing \"data\" payload in the request body","details":{}}}'
            );

            $client = new Client('https://localhost:1337', '', $httpClient);

            $client->put('/', '');

            $this->fail('ApiException not raised.');
        } catch (ApiException $e) {
            $this->assertEquals(400, $e->httpStatus);
            $this->assertEquals('ValidationError', $e->errorType);
        }
    }

    public function testDeleteExecutesRequest(): void
    {
        $httpClient = $this->createHttpClientMock(200, '{}');

        $client = new Client('https://localhost:1337', '', $httpClient);
        $result = $client->delete('/');

        $this->assertSame([], $result);
    }

    public function testRequestExecutionThrowsCommunicationException(): void
    {
        $client = new Client('https://invalid', '');

        try {
            $client->get('/');
            $this->fail('CommunicationException not raised.');
        } catch (CommunicationException $e) {
            $this->assertSame(0, $e->getCode());
        }
    }

    public function provideStatusCodes(): iterable
    {
        yield [200];
        yield [300];
        yield [301];
    }

    private function createHttpClientMock(
        int $status = 200,
        string $content = '{',
        string $contentType = 'application/json'
    ) {
        $stream = $this->createMock(StreamInterface::class);
        $stream
            ->expects($this->once())
            ->method('getContents')
            ->willReturn($content);

        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects($this->any())
            ->method('getStatusCode')
            ->willReturn($status);
        $response
            ->expects($this->any())
            ->method('getHeader')
            ->with('content-type')
            ->willReturn([$contentType]);
        $response
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($stream);

        $httpClient = $this->createMock(ClientInterface::class);
        $httpClient
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->isInstanceOf(RequestInterface::class))
            ->willReturn($response);

        return $httpClient;
    }
}