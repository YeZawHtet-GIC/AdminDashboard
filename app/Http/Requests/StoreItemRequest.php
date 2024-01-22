<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            "name"=> "required|unique:items|max:255",
            "price"=> "required",
            "category"=> "required",
            "epdate"=> "required",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif",
        ];
    }
}
