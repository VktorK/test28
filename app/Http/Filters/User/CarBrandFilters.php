<?php

namespace App\Http\Filters\User;

use App\Http\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;

class CarBrandFilters extends AbstractFilters
{
    protected array $keys = [
        'title',
        'created_from',
        'created_to',
    ];


    protected function title(Builder $builder, $value)
    {
        $builder->where('title', "like" , "%$value%");
    }

    protected function createdFrom(Builder $builder, $value): void
    {
        $builder->where('created_at', ">=" , "%$value%");
    }

    protected function createdTo(Builder $builder, $value): void
    {
        $builder->where('created_at', "<=" , "%$value%");
    }
}
