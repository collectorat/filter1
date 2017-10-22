<?php

namespace App\Filters\Course;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class SubjectFilter extends FilterAbstract
{
    /**
     * Filter by subject.
     *
     * @param  string $subject
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $value)
    {
        return $builder->whereHas('subjects', function (Builder $builder) use ($value) {
            $builder->where('slug', $value);
        });
    }
}
