<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidatureRequest extends FormRequest
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
            'cne'        => 
                'required',
                'unique:be_candidatures',
            
            'cni'      => 
                'unique:be_candidatures',
            
            'telephone_1'         => 
                'required',
             'email'        => 
                 'required|unique:be_candidatures',
            
             
         
        
       
        
       
            
        
            
        ];
    }
}
