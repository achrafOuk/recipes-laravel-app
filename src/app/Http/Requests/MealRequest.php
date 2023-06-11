<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|string',
            'instructions' => 'required|string',
            'meassures' => 'required|array',
            'ingredients' => 'required|array',
            'area' => 'required|integer',
            'category' => 'required|integer',
            'ingredients' => [ 'required', 'array', 'min:1',
            function ($attribute, $value, $fail) {
                    if (empty($value[0])) {
                        $fail('The first element of the items array must have a value.');
                    }
                },
            ],
            'meassures' => [ 'required', 'array', 'min:1',
            function ($attribute, $value, $fail) {
                    if (empty($value[0])) {
                        $fail('The first element of the items array must have a value.');
                    }
                },
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.unique' => 'The name is already taken',
            'image.required' => 'An image is required',
            'image.unique' => 'The image is already taken',
            'instructions.required' => 'instructions are required',
            // 'meassures.0' => 'meassures are required',
            // 'ingredients.0' => 'ingredients are required',
        ];
    }
}
