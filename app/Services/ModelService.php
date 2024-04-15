<?php

namespace App\Services;

use App\DTO\CreateModelDTO;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Pagination\LengthAwarePaginator;

class ModelService
{
    public function __construct()
    {
        $this->model = new CarModel;
    }

    public function create(CreateModelDTO $modelDTO): CarModel
    {
        $brand = (new Brand())->firstOrCreate([
            'name' => $modelDTO->brand->name
        ]);

        return $this->model->firstOrCreate([
            'name' => $modelDTO->name,
            'brand_id' => $brand->id,
        ]);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->paginate(config('api.pagination'));
    }
}
