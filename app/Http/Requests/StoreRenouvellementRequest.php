<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRenouvellementRequest extends FormRequest
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
            // 'cne'        => 
            //     'required|unique:be_renouvellements',
                
            
            // 'cni'      => 
            //     'required|unique:be_renouvellements',
                
            
            // 'numero_compte'         => 
            //     'required|unique:be_renouvellements|min:24',
                
                
                
            
            // 'city'        => [
            //     'required',
            // ],
           /* 'tel_1'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tel_2'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],*/
            // 'email'       => [
            //     'required',
            //     'unique:participants',
            // ],
            // 'password'    => [
            //     'required',
            // ],
            // 'parent_name' => [
            //     'required',
            // ],
        ];
    }
}