<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Exceptions;

use Psr\Http\Message\ResponseInterface;

class ApiException extends \Exception
{
    /**
     * Http status code.
     *
     * @var int
     */
    public int $httpStatus = 0;

    /**
     * Api error type
     *
     * @var string|null
     */
    public string|null $errorType;

    /**
     * Http response body.
     *
     * @var mixed|null
     */
    public mixed $httpBody = null;

    public function __construct(ResponseInterface $response, $httpBody, $previous = null)
    {
        $this->httpBody = $httpBody;
        $this->httpStatus = $response->getStatusCode();
        $this->errorType = $this->getErrorTypeFromHttpBody();

        parent::__construct(
            $this->getMessageFromHttpBody() ?? $response->getReasonPhrase(),
            $this->httpStatus,
            $previous
        );
    }

    public function __toString(): string
    {
        $base = 'Strapi ApiException: Http Status: ' . $this->httpStatus;

        if (!is_null($this->message)) {
            $base .= ' - Message: ' . $this->message;
        }

        if (!is_null($this->errorType)) {
            $base .= ' - Type: ' . $this->errorType;
        }

        return $base;
    }

    private function getMessageFromHttpBody(): string|null
    {
        if (!is_array($this->httpBody)) {
            return null;
        }

        if (!array_key_exists('error', $this->httpBody)) {
            return null;
        }

        if (!is_array($this->httpBody['error'])) {
            return null;
        }

        if (!array_key_exists('message', $this->httpBody['error'])) {
            return null;
        }

        return $this->httpBody['error']['message'];
    }


    private function getErrorTypeFromHttpBody(): ?string
    {
        if (!is_array($this->httpBody)) {
            return null;
        }

        if (!array_key_exists('error', $this->httpBody)) {
            return null;
        }

        if (!is_array($this->httpBody['error'])) {
            return null;
        }

        if (!array_key_exists('name', $this->httpBody['error'])) {
            return null;
        }

        return $this->httpBody['error']['name'];
    }
}
