<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'name' => ['required', 'unique:types', 'max:100'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il name è obbligatorio',
            'title.unique' => 'Il Tipo di progetto con questo name è già presente nella pagina',
            'title.max' => 'Il name può essere lungo al massimo :max caratteri.',
        ];
    }
}
