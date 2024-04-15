<?php

namespace App\Services;

use App\DTO\CreateBrandDTO;
use App\Models\Brand;
use Illuminate\Pagination\LengthAwarePaginator;

class BrandService
{
    public function __construct(){
        $this->model = new Brand;
    }

    public function create(CreateBrandDTO $brandDTO): Brand
    {
        return $this->model->firstOrCreate($brandDTO->name);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->paginate(config('api.pagination'));
    }
}
