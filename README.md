# Strapi PHP Client library

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mbvienasbaitas/strapi-php-client.svg?style=flat-square)](https://packagist.org/packages/mbvienasbaitas/strapi-php-client)
![Test Status](https://img.shields.io/github/actions/workflow/status/mbvienasbaitas/strapi-php-client/run-tests.yaml?label=tests&branch=main)
[![Total Downloads](https://img.shields.io/packagist/dt/mbvienasbaitas/strapi-php-client.svg?style=flat-square)](https://packagist.org/packages/mbvienasbaitas/strapi-php-client)

## Installation

To get started, simply require the project using [Composer](https://getcomposer.org/).<br>
You will also need to install packages that "provide" [`psr/http-client-implementation`](https://packagist.org/providers/psr/http-client-implementation) and [`psr/http-factory-implementation`](https://packagist.org/providers/psr/http-factory-implementation).<br>
A list with compatible HTTP clients and client adapters can be found at [php-http.org](http://docs.php-http.org/en/latest/clients.html).

**If you don't know which HTTP client to use, we recommend using Guzzle 7**:

```bash
composer require mbvienasbaitas/strapi-php-client guzzlehttp/guzzle http-interop/http-factory-guzzle:^1.0
```

## Usage

```php
use VienasBaitas\Strapi\Client\Client;
use VienasBaitas\Strapi\Client\Contracts\Requests\Collection\IndexRequest;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionLocale;
use VienasBaitas\Strapi\Client\Contracts\Requests\Options\OptionSortAsc;

$client = new Client('{url}', '{token}');

$request = IndexRequest::make(
    new OptionLocale('en'),
    new OptionSortAsc('title'),
);

$endpoint = $client->collection('articles');

$response = $endpoint->index($request);
```

More usage examples can be found in [examples](examples) folder.

### Available request options

Each request can accept multiple options. Here is a list of all available options.

| Option                                                                           | Description                                                                                          |
|----------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------|
| [OptionFields](src/Contracts/Requests/Options/OptionFields.php)                  | Defines which fields to load.                                                                        |
| [OptionFilters](src/Contracts/Requests/Options/OptionFields.php)                 | Applies specified filters.                                                                           |
| [OptionId](src/Contracts/Requests/Options/OptionFields.php)                      | Sets active resource ID.                                                                             |
| [OptionJsonBody](src/Contracts/Requests/Options/OptionFields.php)                | Ads application/json body from a given array.                                                        |
| [OptionLocale](src/Contracts/Requests/Options/OptionFields.php)                  | Sets resource locale.                                                                                |
| [OptionPaginationOffset](src/Contracts/Requests/Options/OptionFields.php)        | Offset based pagination.                                                                             |
| [OptionPaginationPaged](src/Contracts/Requests/Options/OptionFields.php)         | Page based pagination.                                                                               |
| [OptionPopulateDeep](src/Contracts/Requests/Options/OptionFields.php)            | Sets populate option, requires `strapi-plugin-populate-deep` plugin to be installed in strapi build. |
| [OptionPopulateNested](src/Contracts/Requests/Options/OptionFields.php)          | Defines which relations to load.                                                                     |
| [OptionPopulateWildcard](src/Contracts/Requests/Options/OptionFields.php)        | Loads all first level relations.                                                                     |
| [OptionPublicationStateLive](src/Contracts/Requests/Options/OptionFields.php)    | Set publication state to `live`.                                                                     |
| [OptionPublicationStatePreview](src/Contracts/Requests/Options/OptionFields.php) | Set publication state to `preview`.                                                                  |
| [OptionSort](src/Contracts/Requests/Options/OptionFields.php)                    | Define sorting options.                                                                              |
| [OptionSortAsc](src/Contracts/Requests/Options/OptionFields.php)                 | Set single field sort in ascending order.                                                            |
| [OptionSortDesc](src/Contracts/Requests/Options/OptionFields.php)                | Set single field sort in descending order.                                                           |
| [OptionStreamBody](src/Contracts/Requests/Options/OptionFields.php)              | Set custom stream body, mainly used for media uploads.                                               |

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Edvinas Kručas](https://github.com/edvinaskrucas)
- [All Contributors](../../contributors)

This package structure was inspired by [meilisearch-php](https://github.com/meilisearch/meilisearch-php) package.

## Alternatives

- [curl](https://docs.strapi.io/developer-docs/latest/developer-resources/content-api/integrations/php.html)
- [kazakevic/strapi-wrapper](https://github.com/kazakevic/strapi-wrapper)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
