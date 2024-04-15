<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brand' => $this->model->brand->name,
            'model' => $this->model->name,
            'year' => $this->whenNotNull($this->year),
            'kilometrage' => $this->whenNotNull($this->kilometrage),
            'color'=> $this->whenNotNull($this->color?->name)
        ];
    }
}
