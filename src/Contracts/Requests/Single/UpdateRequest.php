<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Single;

use VienasBaitas\Strapi\Client\Contracts\Requests\BodyAware;
use VienasBaitas\Strapi\Client\Contracts\Requests\HasBody;
use VienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use VienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

class UpdateRequest implements BodyAware, QueryAware
{
    use HasBody;
    use HasQuery;

    /**
     * Create new request with given options.
     *
     * @param UpdateRequestOption ...$option
     * @return static
     */
    public static function make(UpdateRequestOption ...$option): static
    {
        return (new static())->options(...$option);
    }

    /**
     * Return request copy with applied options.
     *
     * @param UpdateRequestOption ...$option
     * @return static
     */
    public function options(UpdateRequestOption ...$option): self
    {
        $request = $this;

        foreach ($option as $opt) {
            $request = $opt->applySingleUpdateRequest($request);
        }

        return $request;
    }
}