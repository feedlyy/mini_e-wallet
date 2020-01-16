<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            //
            'balance' => 'required|integer',
            'balance_achieve' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'balance.required' => 'balance is required',
            'balance_achieve.required'  => 'balance achieve is requried',
            'balance.integer' => 'balance must be integer'
        ];
    }
}
