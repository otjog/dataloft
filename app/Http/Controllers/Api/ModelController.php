<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModelResource;
use App\Services\ModelService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ModelController extends Controller
{
    public function __construct(private ModelService $modelService) {}

    public function index() : AnonymousResourceCollection
    {
        return ModelResource::collection($this->modelService->all());
    }
}
