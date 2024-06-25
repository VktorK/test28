<?php

namespace App\Http\Filters\Admin;

use App\Http\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;

class CarModelFilters extends AbstractFilters
{
    protected array $keys = [
        'title',
        'car_brand_id',
        'created_from',
        'created_to',
    ];


    protected function title(Builder $builder, $value)
    {
        $builder->where('title', "like" , "%$value%");
    }
    protected function carBrandId(Builder $builder, $value): void
    {
        $builder->where('car_brand_id', "=" , $value);
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
