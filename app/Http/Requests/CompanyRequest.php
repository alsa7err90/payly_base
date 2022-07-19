<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{ 
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'name' => 'required',
            'state' => 'required|',
            'url_api' => 'required',
            'api_key' => 'required',
            'fee' => 'required|numeric', 
            'type_fee' => 'required',
            
        ];
    }
}
