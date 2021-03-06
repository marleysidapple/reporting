<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PatientRequest extends Request
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
            'name'             => 'required',
            'email'            => 'required|email|unique:users,email',
            'address'          => 'required',
            'phone'            => 'required',
            'gender'           => 'required',
            'age'              => 'required|digits_between:2,100',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }
}
