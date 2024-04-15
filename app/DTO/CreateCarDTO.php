<?php

namespace App\DTO;

class CreateCarDTO
{
    public CreateBrandDTO $brandDTO;

    public CreateModelDTO $modelDTO;

    public CreateColorDTO|null $colorDTO;

    public int|null $year;

    public int|null $kilometrage;

    public function __construct(array $args)
    {
        $this->brandDTO = new CreateBrandDTO($args['brand']);

        $this->modelDTO = new CreateModelDTO($args['model'], $this->brandDTO);

        $this->colorDTO = (isset($args['color'])) ? new CreateColorDTO($args['color']) : null;

        $this->year = $args['year'] ?? null;

        $this->kilometrage = $args['kilometrage'] ?? null;
    }

}
