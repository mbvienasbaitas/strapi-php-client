<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Http\Serialize;

interface SerializerInterface
{
    /**
     * Serialize data into string.
     *
     * @param mixed $data
     * @return string
     */
    public function serialize(mixed $data): string;

    /**
     * Unserialize string data.
     *
     * @param string $string
     * @return mixed
     */
    public function unserialize(string $string): mixed;
}
