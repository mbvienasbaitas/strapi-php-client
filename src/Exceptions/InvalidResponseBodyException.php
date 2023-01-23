<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;

class InvalidResponseBodyException extends Exception
{
    public function __construct(ResponseInterface $response, $previous = null)
    {
        parent::__construct(
            $response->getBody()->getContents() ?? $response->getReasonPhrase(),
            $response->getStatusCode(),
            $previous
        );
    }

    public function __toString(): string
    {
        $base = 'Strapi InvalidResponseBodyException: Http Status: '.$this->code;

        if ($this->message) {
            $base .= ' - Message: '.$this->message;
        }

        return $base;
    }
}
