<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'nome_progetto' => 'required|max:50',
            'descrizione' => 'required|string',
            'type_id' => 'nullable|exists:types,id',
            'data' => 'required|date',
            'cover_immagine' => 'required'
        ];
    }
    
    public function messages(){

        return[
            'nome_progetto.required' => 'Nome del progetto obbligatorio',
            'nome_progetto.max' => 'Il nome non deve superare i 50 caratteri',
            'descrizione.required' =>'Descrizione obbligatoria',
            'descrizione.string' => 'La descrizione deve essere inserita come testo',
            'type_id.exists' => 'La categoria selelzionata non esiste',
            'data.required'=> 'Data obbligatoria',
            'data.date'=> 'Deve essere una data valida',
            'cover_immagine.required'=> 'Immagine obbligatorio',
            
        ];
    }
}
