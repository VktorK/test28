<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\NoReturn;

trait HasFilterAdmin
{
    public function scopeFilter(Builder $builder , array $data)
    {
        $className = 'App\Http\Filters\Admin\\' . class_basename($this) . 'Filters';
        $filter = app()->make($className);
        return $filter->apply($builder,$data);
    }
}
