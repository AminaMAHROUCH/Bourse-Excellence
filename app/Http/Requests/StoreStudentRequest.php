<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'cne'        => [
                'required',
                'unique:be_candidatures',
            ],
            'cni'      => [
                'required',
                'unique:be_candidatures',
            ],
            'nom_prenom'         => [
                'required',
        
            ],
             'email'        => [
                 'required',
             ],
            'anne_bac'       => [
                'required',
                
            ],
            
        ]; 
    }
}
