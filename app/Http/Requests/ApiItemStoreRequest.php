<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiItemStoreRequest extends FormRequest
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
            "name" => "required|unique:items|max:255",
            "price" => "required",
            'category_id' => 'required|exists:categories,id',
            'expire_date' => 'required|date',
            "image" => "required|image|mimes:jpeg,png,jpg,gif",
        ];
    }
    /**
     * Overriding the  function to response json error
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Failed to add New Item',
            'errors' => $validator->errors(),
        ], 422));
    }
}
