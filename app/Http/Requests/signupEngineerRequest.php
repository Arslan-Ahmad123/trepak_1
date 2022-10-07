<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class signupEngineerRequest extends FormRequest
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
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'pic' => ['image','mimes:jpeg,jpg,png'],
            'mobile' => ['required','regex:/^[^a-z]*$/i'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed','min:8'],
        ];
    }
}
