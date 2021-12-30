<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditproductRequest extends FormRequest
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
            "name"=>"required|unique:products,name,'.$this->segment(4).',id",
            "image" => "image",
            "code" => "unique:products,code|required",
            "price" => "required|numeric",
            "warranty" => "required",
            "accessories" => "required",
            "condition" => "required",
            "promotion" => "required",
            "status" => "required",
            "description" => "required",
            "featured" => "required",
            "category" => "required"

        ];
    }
}