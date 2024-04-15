<?php

namespace App\DTO;

class CreateModelDTO
{
    public function __construct(public string $name, public CreateBrandDTO $brand) {}
}
