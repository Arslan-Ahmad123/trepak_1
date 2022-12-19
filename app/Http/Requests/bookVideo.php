<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookVideo extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_date'=>['required'],
            'client_time'=>['required'],
            'mobile' => ['required','regex:/^[^a-z]*$/i'],
        ];
    }
}
