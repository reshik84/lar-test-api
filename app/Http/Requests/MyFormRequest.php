<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyFormRequest extends FormRequest
{
    
    public $redirect = 'resault';
    
    
    
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
            'first_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'sum' => 'required|numeric|min:0.01',
            'card_no' => 'required|digits:16',
            'card_month' => 'required|integer|between:1,12',
            'card_year' => 'required|integer|min:' . date('y'),
            'cvv' => 'required|digits:3',
            'city' => 'required|min:2|max:100',
            'state' => 'required|min:2|max:100',
            'address' => 'required|min:2|max:100',
            'zip_code' => 'required|digits:5',
            'hash' => 'required|checkhash',
        ];
    }
    
    
    public function response(array $errors)
    {
        return new \Illuminate\Http\JsonResponse([
            'errors' => true,
            'messages' => $errors
        ], 200);
    }
    
}
