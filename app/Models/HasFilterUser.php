<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait HasFilterUser
{
    public function scopeFilterUser(Builder $builder , array $data)
    {
        $className = 'App\Http\Filters\User\\' . class_basename($this) . 'Filters';
        $filter = app()->make($className);
        return $filter->apply($builder,$data);
    }
}
