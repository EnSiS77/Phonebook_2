<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhonebookUpdateRequest extends FormRequest
{
    /**
     * 
     *Determine if the user is authorized to make this request.
     *
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     *
     */
      
     
    public function rules(): array
    {
        return [
            'name'         => 'required|min:3|max:100',
            'email'        => 'required|email',
            'phone'        => 'required|numeric|digits:10',
        ];
    }
}