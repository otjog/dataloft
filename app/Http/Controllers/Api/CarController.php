<?php

namespace App\Http\Controllers\Api;

use App\DTO\CreateCarDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Resources\CarResource;
use App\Services\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarController extends Controller
{
    public function __construct(private CarService $carService) {}

    public function index() : AnonymousResourceCollection
    {
        return CarResource::collection($this->carService->all());
    }

    public function store(StoreCarRequest $request): JsonResponse
    {
        $carDTO = new CreateCarDTO($request->validated());

        $this->carService->create($carDTO);

        return response()->json(['success' => 'OK']);
    }

    public function show(int $id): CarResource
    {
        return CarResource::make($this->carService->get($id));
    }

    public function update(StoreCarRequest $request, string $id): JsonResponse
    {
        $carDTO = new CreateCarDTO($request->validated());

        $this->carService->update($id, $carDTO);

        return response()->json(['success' => 'OK']);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->carService->delete($id);

        return response()->json(['success' => 'OK']);
    }
}
