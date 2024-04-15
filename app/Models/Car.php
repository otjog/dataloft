<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends EloquentModel
{
    use HasFactory;

    protected $fillable = [
        'model_id', 'color_id', 'year', 'kilometrage'
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
