<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class AbstractFilters
{
    protected array $keys = [];

    public function apply(Builder $builder, array $data): Builder
    {
        foreach ($this->keys as $key) {
            if (isset($data[$key]) && method_exists($this,$methood = Str::camel($key)))
                {
                $this->$methood($builder, $data[$key]);
                }
            }
        return $builder;
    }
}
