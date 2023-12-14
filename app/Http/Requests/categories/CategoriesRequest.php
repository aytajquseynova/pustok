<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       $supportedLanguages=LaravelLocalization::getSupportedLanguagesKeys();
       $rules=[];
       foreach($supportedLanguages as $lang){
        $rules["title.$lang"]='required';
       }
       return $rules;
    }
}
