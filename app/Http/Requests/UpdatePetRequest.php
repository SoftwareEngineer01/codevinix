<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:pets,id',
            'name' => 'required|max:255',
            'category' => 'required|integer|exists:categories,id',
            'status' => 'required|in:available,pending,sold',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Pet id is required',
            'id.integer' => 'Pet id must be an integer',
            'id.exists' => 'Pet not found',
        ];
    }
}
