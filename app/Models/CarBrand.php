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
    use HasFilterAdmin;
    use HasFilterUser;

    protected $guarded =false;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
