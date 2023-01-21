<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

use VienasBaitas\Strapi\Client\Contracts\Requests\BodyAware;
use VienasBaitas\Strapi\Client\Contracts\Requests\HasBody;
use VienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use VienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

class StoreRequest implements BodyAware, QueryAware
{
    use HasBody;
    use HasQuery;

    /**
     * Create new request with given options.
     *
     * @param StoreRequestOption ...$option
     * @return static
     */
    public static function make(StoreRequestOption ...$option): static
    {
        return (new static())->options(...$option);
    }

    /**
     * Return request copy with applied options.
     *
     * @param StoreRequestOption ...$option
     * @return static
     */
    public function options(StoreRequestOption ...$option): self
    {
        $request = $this;

        foreach ($option as $opt) {
            $request = $opt->applyCollectionStoreRequest($request);
        }

        return $request;
    }
}
