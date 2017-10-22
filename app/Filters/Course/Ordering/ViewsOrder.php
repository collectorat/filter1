<?php

namespace App\Filters\Course\Ordering;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class ViewsOrder extends FilterAbstract
{
    /**
     * Order by views in descending
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $direction)
    {
        return $builder->orderBy('views', $this->resolveOrderDirection($direction));
    }
}
