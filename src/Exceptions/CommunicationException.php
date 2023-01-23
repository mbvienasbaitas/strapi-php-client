<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Exceptions;

use Exception;

class CommunicationException extends Exception
{
    public function __toString(): string
    {
        return 'Strapi CommunicationException: '.$this->getMessage();
    }
}
