<?php

declare(strict_types=1);

namespace MBVienasBaitas\Strapi\Client\Contracts\Requests\Media;

use MBVienasBaitas\Strapi\Client\Contracts\Requests\HasQuery;
use MBVienasBaitas\Strapi\Client\Contracts\Requests\QueryAware;

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
