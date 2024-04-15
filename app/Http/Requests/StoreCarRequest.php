<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand' => [
                'required',
                'string',
                'max:50'
            ],
            'model' => [
                'required',
                'string',
                'max:50'
            ],
            'year' => [
                'filled',
                'date_format:Y',
                'after_or_equal:1900-01-01',
                'before_or_equal:today'
            ],
            'kilometrage' => [
                'filled',
                'integer',
                'min:0',
                'max:10000000'
            ],
            'color' => [
                'filled',
                'string'
            ],
        ];
    }
}
