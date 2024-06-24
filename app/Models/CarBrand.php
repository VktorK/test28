<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =false;

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
