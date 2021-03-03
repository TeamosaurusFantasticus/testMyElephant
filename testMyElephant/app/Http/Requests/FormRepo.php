<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formRepo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "url" => "required|url",
            "name" => "required|max:255"
        ];
    }

    public function message()
    {
        return [
            "url.required" => "Une URL est obligatoire !",
            "url.url" => "Veuillez saisir une URL valide !",
            "name.required" => "un nom de repository est obligatoire !",
            "name.max" => "Veuillez saisir un nom contenant maximum 255 charactères"
        ];
    }
}
