<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Collection;

use VienasBaitas\Strapi\Client\Contracts\Requests\HasId;
use VienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use VienasBaitas\Strapi\Client\Contracts\Requests\IdAware;
use VienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

class ShowRequest implements IdAware, QueryAware
{
    use HasId;
    use HasQuery;

    /**
     * Create new request with given options.
     *
     * @param ShowRequestOption ...$option
     * @return static
     */
    public static function make(ShowRequestOption ...$option): static
    {
        return (new static())->options(...$option);
    }

    /**
     * Return request copy with applied options.
     *
     * @param ShowRequestOption ...$option
     * @return static
     */
    public function options(ShowRequestOption ...$option): self
    {
        $request = $this;

        foreach ($option as $opt) {
            $request = $opt->applyCollectionShowRequest($request);
        }

        return $request;
    }
}
