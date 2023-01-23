<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Http\Serialize;

use MBVienasBaitas\Strapi\Client\Exceptions\JsonDecodingException;
use MBVienasBaitas\Strapi\Client\Exceptions\JsonEncodingException;
use JsonException;

class Json implements SerializerInterface
{
    private const JSON_ENCODE_ERROR_MESSAGE = 'Encoding payload to json failed: "%s".';
    private const JSON_DECODE_ERROR_MESSAGE = 'Decoding payload to json failed: "%s".';

    /**
     * @param mixed $data
     * @return string
     * @throws JsonEncodingException
     */
    public function serialize(mixed $data): string
    {
        try {
            $encoded = json_encode($data, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new JsonEncodingException(
                sprintf(self::JSON_ENCODE_ERROR_MESSAGE, $e->getMessage()),
                $e->getCode(),
                $e
            );
        }

        return $encoded;
    }

    /**
     * @param string $string
     * @return mixed
     * @throws JsonDecodingException
     */
    public function unserialize(string $string): mixed
    {
        try {
            $decoded = json_decode($string, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new JsonDecodingException(
                sprintf(self::JSON_DECODE_ERROR_MESSAGE, $e->getMessage()),
                $e->getCode(),
                $e
            );
        }

        return $decoded;
    }
}
