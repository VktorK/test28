<?php

namespace App\Http\Filters\User;

use App\Http\Filters\AbstractFilters;
use Illuminate\Database\Eloquent\Builder;

class CarFilters extends AbstractFilters
{
    protected array $keys = [
        'year_of_issue_from',
        'year_of_issue_to',
        'mileage_from',
        'mileage_to',
        'color',
        'car_brand_id',
        'car_model_id',
        'user_id',
        'created_from',
        'created_to',
    ];


    protected function color(Builder $builder, $value)
    {
        $builder->where('color', "like" , "%$value%");
    }

    protected function mileageFrom(Builder $builder, $value)
    {
        $builder->where('mileage', ">=" , $value);
    }

    protected function mileageTo(Builder $builder, $value)
    {
        $builder->where('color', "<=" , $value);
    }


    protected function carBrandId(Builder $builder, $value): void
    {
        $builder->where('car_brand_id', "=" , $value);
    }

    protected function carModelId(Builder $builder, $value): void
    {
        $builder->where('car_model_id', "=" , $value);
    }

    protected function userId(Builder $builder,$value): void
    {
//        $value = auth()->id();
        $builder->where('user_id', "=" , $value);
    }

    protected function yearOfIssueFrom(Builder $builder, $value): void
    {
        $builder->where('year_of_issue', ">=" , $value);
    }

    protected function yearOfIssueTo(Builder $builder, $value): void
    {
        $builder->where('year_of_issue', "<=" , $value);
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
