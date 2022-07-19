<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
{ 
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'name' => 'required',
            'state' => 'required',
            'amount' => 'required|numeric',
            'type_amount' => 'required',
            'fee' => 'required|numeric', 
            'type_fee' => 'required',
            'company_id' => 'required|numeric', 
            'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
