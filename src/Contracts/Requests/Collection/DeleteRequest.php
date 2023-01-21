<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

use VienasBaitas\Strapi\Client\Contracts\Requests\HasId;
use VienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use VienasBaitas\Strapi\Client\Contracts\Requests\IdAware;
use VienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

class DeleteRequest implements IdAware, QueryAware
{
    use HasId;
    use HasQuery;

    /**
     * Create new request with given options.
     *
     * @param DeleteRequestOption ...$option
     * @return static
     */
    public static function make(DeleteRequestOption ...$option): static
    {
        return (new static())->options(...$option);
    }

    /**
     * Return request copy with applied options.
     *
     * @param DeleteRequestOption ...$option
     * @return static
     */
    public function options(DeleteRequestOption ...$option): static
    {
        $request = $this;

        foreach ($option as $opt) {
            $request = $opt->applyCollectionDeleteRequest($request);
        }

        return $request;
    }
}
