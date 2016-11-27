<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UpdateOperatorRequest extends Request
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
        $op = User::find($this->route('id'));
        return [
            'name'             => 'required',
            'email'            => 'required|email|unique:users,email,' . $op->id,
            'password'         => 'min:6',
            'confirm_password' => 'same:password',
        ];
    }
}
