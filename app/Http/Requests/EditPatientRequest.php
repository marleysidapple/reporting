<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class EditPatientRequest extends Request
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
        $patient = User::find($this->route('id'));

        return [
            'name'    => 'required',
            'email'   => 'required|email|unique:users,email,' . $patient->id,
            'address' => 'required',
            'phone'   => 'required',
            'gender'  => 'required',
            'age'     => 'required|digits_between:2,100',
        ];
    }
}
