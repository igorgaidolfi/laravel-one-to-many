<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|max:120',
            'type_id' => 'nullable|exists:types,id',
            'content' => 'required|min:20'
        ];
    }
    
    public function messages()
    {
        return[
            'title.required' => 'Il titolo e\' richiesto',
            'title.max' => 'Il titolo puo\' contenere al massimo 120 caratteri',
            'type_id.exists' => 'Il tipo non esiste',
            'content.required' => 'Il contenuto e\' obbligatorio',
            'content.min' => 'Il contenuto deve contenere minimo 20 caratteri'
        ];
    }
}
