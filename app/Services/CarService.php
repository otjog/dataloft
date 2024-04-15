<?php

namespace App\Services;

use App\DTO\CreateCarDTO;
use App\DTO\UpdateCarDTO;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarService
{
    public function __construct()
    {
        $this->model = new Car();
    }

    public function create(CreateCarDTO $carDTO): void
    {
        $model = (new ModelService())->create($carDTO->modelDTO);

        $color = (new ColorService())->create($carDTO->colorDTO);

        $this->model->create([
            'model_id' => $model->id,
            'color_id' => $color?->id,
            'year' => $carDTO->year,
            'kilometrage' => $carDTO->kilometrage,
        ]);
    }

    public function all(): LengthAwarePaginator
    {
        return $this->model->paginate(config('api.pagination'));
    }

    public function get(int $id): Car
    {
        return $this->model->findOrFail($id);
    }

    public function delete(int $id): void
    {
        $this->get($id)->delete();
    }

    public function update(int $id, CreateCarDTO $carDTO): void
    {
        $model = (new ModelService())->create($carDTO->modelDTO);

        $color = (new ColorService())->create($carDTO->colorDTO);

        $this->get($id)->update([
            'model_id' => $model->id,
            'color_id' => $color?->id,
            'year' => $carDTO->year,
            'kilometrage' => $carDTO->kilometrage,
        ]);
    }
}
