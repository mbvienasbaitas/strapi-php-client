<?php

declare(strict_types=1);

namespace VienasBaitas\Strapi\Client\Contracts\Requests\Media;

use VienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use VienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

class IndexRequest implements QueryAware
{
    use HasQuery;

    /**
     * Create new request with given options.
     *
     * @param IndexRequestOption ...$option
     * @return static
     */
    public static function make(IndexRequestOption ...$option): static
    {
        return (new static())->options(...$option);
    }

    /**
     * Return request copy with applied options.
     *
     * @param IndexRequestOption ...$option
     * @return static
     */
    public function options(IndexRequestOption ...$option): self
    {
        $request = $this;

        foreach ($option as $opt) {
            $request = $opt->applyMediaIndexRequest($request);
        }

        return $request;
    }
}
