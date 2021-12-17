<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name'      => 'required',
            'email'     => 'required|email|unique:donaturs',
            'password'  => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'email.email' => 'Email Tidak Valid',
            'email.unique' => 'Email Sudah Digunakan',
            'password.required' => 'Password Wajib Di Isi',
            'password.min' => 'Password Harus Minimal 8 Karakter',
            'password.confirmed' => 'Password Harus Sama Dengan Konfirmasi Password'
        ];
    }

    protected function failedValidation(Validator $validator) 
    { 
        throw new HttpResponseException(response()->json($validator->errors(), 422)); 
    }
}
