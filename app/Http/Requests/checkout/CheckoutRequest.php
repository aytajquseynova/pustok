<?php

namespace App\Http\Requests\checkout;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname'=> 'required|string',
            'email'=> ['required','email'],
            'phone'=> 'required',
            'address'=>'required',
            'town_city'=>'required',
            'state' =>'required',
            'zip_code'=>'required',
            'order_notes'=>'string'

        ];
    }
}
