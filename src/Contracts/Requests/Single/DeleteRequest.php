<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Single;

use VienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use VienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

class DeleteRequest implements QueryAware
{
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
    public function options(DeleteRequestOption ...$option): self
    {
        $request = $this;

        foreach ($option as $opt) {
            $request = $opt->applySingleDeleteRequest($request);
        }

        return $request;
    }
}
