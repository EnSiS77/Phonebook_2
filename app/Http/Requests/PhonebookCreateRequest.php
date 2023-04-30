<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class PhonebookCreateRequest extends FormRequest
{
    /**
     *Determine if the user is authorized to make this request.
     */
     
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
    *
     *@return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
     
    
     public function rules(): array
     {
         return [
             'inputs.*.name' => 'required|min:3|max:100',
             'inputs.*.email' => 'required|email',
             'inputs.*.phone' => 'required|regex:/^\+?[0-9]{6,30}$/',
         ];
     }
     
}