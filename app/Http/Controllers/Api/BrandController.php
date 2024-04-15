<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Services\BrandService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BrandController extends Controller
{
    public function __construct(private BrandService $brandService) {}

    public function index() : AnonymousResourceCollection
    {
        return BrandResource::collection($this->brandService->all());
    }
}
