<?php

declare(strict_types=1);

namespace Tests\Utils\Scroll;

use PHPUnit\Framework\TestCase;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use MBVienasBaitas\Strapi\Client\Endpoints\Collection;
use MBVienasBaitas\Strapi\Client\Http\Client as HttpClient;
use MBVienasBaitas\Strapi\Client\Utils\Scroll;

class ScrollTest extends TestCase
{
    public function testLoadsItemsUntilExists(): void
    {
        $httpClient = $this->createMock(HttpClient::class);

        $httpClient
            ->expects($this->exactly(2))
            ->method('get')
            ->withConsecutive(
                ['/api/pages', ['pagination' => ['page' => 1, 'pageSize' => Scroll::PER_PAGE]]],
                ['/api/pages', ['pagination' => ['page' => 2, 'pageSize' => Scroll::PER_PAGE]]],
            )
            ->willReturnOnConsecutiveCalls(
                ['data' => array_fill(0, Scroll::PER_PAGE + 1, ['data' => 1]), 'meta' => []],
                ['data' => [['data' => 1]], 'meta' => []],
            );

        $endpoint = new Collection($httpClient, 'pages');

        $request = IndexRequest::make();

        $scroll = new Scroll($endpoint);

        foreach ($scroll->request($request)->scroll() as $row) {
            //
        }
    }
}