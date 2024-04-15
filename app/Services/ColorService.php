<?php

namespace App\Services;

use App\DTO\CreateColorDTO;
use App\Models\Color;

class ColorService
{
    public function __construct(){
        $this->model = new Color();
    }

    public function create(CreateColorDTO|null $colorDTO): Color|null
    {
        return ($colorDTO) ? (new Color())->firstOrCreate(['name' => $colorDTO->name]) : null;
    }
}
