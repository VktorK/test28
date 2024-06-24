<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'year_of_issue' => $this-> year_of_issue,
            'mileage' => $this-> mileage,
            'color' => $this-> color,
            'car_brand_id' => $this-> car_brand_id,
            'car_model_id' => $this-> car_model_id,
            'user_id' => $this-> user_id,
        ];
    }
}
