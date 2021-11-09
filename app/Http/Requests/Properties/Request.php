<?php

namespace App\Http\Requests\Properties;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'sometimes|required',
            'title' => 'required',
            'description' => '',
            'email' => 'required',
            'cep' => 'required',
            'state' => 'required',
            'city' => 'required',
            'district' => 'required',
            'street' => 'required',
            'number' => 'required',
            'complement' => '',
        ];
    }
}
