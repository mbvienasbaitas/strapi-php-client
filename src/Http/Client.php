<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Http;

use MBVienasBaitas\Strapi\Client\Contracts\Http;
use MBVienasBaitas\Strapi\Client\Exceptions\ApiException;
use MBVienasBaitas\Strapi\Client\Exceptions\CommunicationException;
use MBVienasBaitas\Strapi\Client\Exceptions\InvalidResponseBodyException;
use MBVienasBaitas\Strapi\Client\Exceptions\JsonDecodingException;
use MBVienasBaitas\Strapi\Client\Exceptions\JsonEncodingException;
use MBVienasBaitas\Strapi\Client\Http\Serialize\Json;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class Client implements Http
{
    protected const CONTENT_TYPE_JSON = 'application/json';

    private ClientInterface $client;

    private RequestFactoryInterface $requestFactory;

    private StreamFactoryInterface $streamFactory;

    private string $url;

    private string $token;

    private array $headers;

    private Json $json;

    public function __construct(
        string $url,
        string $token,
        ClientInterface|null $client = null,
        RequestFactoryInterface|null $requestFactory = null,
        StreamFactoryInterface|null $streamFactory = null
    ) {
        $this->url = $url;
        $this->token = $token;
        $this->client = $client ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory();
        $this->json = new Json();
        $this->headers = [
            'Content-Type' => self::CONTENT_TYPE_JSON,
            'Accept' => self::CONTENT_TYPE_JSON,
            'Authorization' => sprintf('Bearer %s', $this->token),
        ];
    }

    /**
     * @param string $path
     * @param array $query
     * @return mixed
     * @throws ApiException
     * @throws ClientExceptionInterface
     * @throws CommunicationException
     * @throws InvalidResponseBodyException
     * @throws JsonDecodingException
     */
    public function get(string $path, array $query = []): mixed
    {
        $request = $this->requestFactory->createRequest(
            'GET',
            $this->url.$path.$this->buildQueryString($query)
        );

        return $this->execute($request);
    }

    /**
     * @param string $path
     * @param mixed|null $body
     * @param array $query
     * @param string|null $contentType
     * @return mixed
     * @throws ApiException
     * @throws ClientExceptionInterface
     * @throws CommunicationException
     * @throws InvalidResponseBodyException
     * @throws JsonDecodingException
     * @throws JsonEncodingException
     */
    public function post(string $path, mixed $body = null, array $query = [], string|null $contentType = null): mixed
    {
        if (!is_null($contentType)) {
            $this->headers['Content-Type'] = $contentType;
        } else {
            $this->headers['Content-Type'] = self::CONTENT_TYPE_JSON;
        }

        if (!is_null($body)) {
            if ($this->headers['Content-Type'] == self::CONTENT_TYPE_JSON) {
                $body = $this->json->serialize($body);
            }
        }

        $request = $this->requestWithBody($this->requestFactory->createRequest(
            'POST',
            $this->url.$path.$this->buildQueryString($query)
        ), $body);

        return $this->execute($request);
    }

    /**
     * @param string $path
     * @param mixed|null $body
     * @param array $query
     * @param string|null $contentType
     * @return mixed
     * @throws ApiException
     * @throws ClientExceptionInterface
     * @throws CommunicationException
     * @throws InvalidResponseBodyException
     * @throws JsonDecodingException
     * @throws JsonEncodingException
     */
    public function put(string $path, mixed $body = null, array $query = [], string|null $contentType = null): mixed
    {
        if (!is_null($contentType)) {
            $this->headers['Content-Type'] = $contentType;
        } else {
            $this->headers['Content-Type'] = self::CONTENT_TYPE_JSON;
        }

        if (!is_null($body)) {
            if ($this->headers['Content-Type'] == self::CONTENT_TYPE_JSON) {
                $body = $this->json->serialize($body);
            }
        }

        $request = $this->requestWithBody($this->requestFactory->createRequest(
            'PUT',
            $this->url.$path.$this->buildQueryString($query)
        ), $body);

        return $this->execute($request);
    }

    /**
     * @param string $path
     * @param array $query
     * @return mixed
     * @throws ApiException
     * @throws ClientExceptionInterface
     * @throws CommunicationException
     * @throws InvalidResponseBodyException
     * @throws JsonDecodingException
     */
    public function delete(string $path, array $query = []): mixed
    {
        $request = $this->requestFactory->createRequest(
            'DELETE',
            $this->url.$path.$this->buildQueryString($query)
        );

        return $this->execute($request);
    }

    /**
     * @param RequestInterface $request
     * @return mixed
     * @throws ApiException
     * @throws ClientExceptionInterface
     * @throws CommunicationException
     * @throws InvalidResponseBodyException
     * @throws JsonDecodingException
     */
    private function execute(RequestInterface $request): mixed
    {
        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        try {
            return $this->parseResponse($this->client->sendRequest($request));
        } catch (NetworkExceptionInterface $e) {
            throw new CommunicationException($e->getMessage(), $e->getCode(), $e);
        }
    }

    private function buildQueryString(array $queryParams = []): string
    {
        return count($queryParams) > 0 ? '?'.http_build_query($queryParams) : '';
    }

    private function requestWithBody(RequestInterface $request, mixed $body): RequestInterface
    {
        if (!is_null($body)) {
            if ($body instanceof StreamInterface) {
                return $request->withBody($body);
            }

            return $request->withBody($this->streamFactory->createStream($body));
        }

        return $request;
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws ApiException
     * @throws InvalidResponseBodyException
     * @throws JsonDecodingException
     */
    private function parseResponse(ResponseInterface $response): mixed
    {
        foreach ($response->getHeader('content-type') as $contentType) {
            if (!str_contains($contentType, self::CONTENT_TYPE_JSON)) {
                throw new InvalidResponseBodyException($response);
            }
        }

        if ($response->getStatusCode() >= 300) {
            $body = $this->json->unserialize($response->getBody()->getContents()) ?? $response->getReasonPhrase();

            throw new ApiException($response, $body);
        }

        return $this->json->unserialize($response->getBody()->getContents());
    }
}
