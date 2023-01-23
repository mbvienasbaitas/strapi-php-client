<?php

declare(strict_types=1);

namespace Tests\Contracts\Requests\Options;

use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Media;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionStreamBody;

class OptionStreamBodyTest extends TestCase
{
    public function testStreamBodyToMediaStoreRequest(): void
    {
        $resource = fopen(__FILE__, 'r');

        $request = Media\StoreRequest::make();

        $stream = new Stream($resource);

        $mutated = $request->options(new OptionStreamBody($stream, 'contentType'));

        $this->assertNotSame($request, $mutated);
        $this->assertEquals('contentType', $mutated->contentType());
        $this->assertSame($stream, $mutated->body());

        fclose($resource);
    }
}
