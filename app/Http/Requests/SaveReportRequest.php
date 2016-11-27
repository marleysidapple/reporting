<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveReportRequest extends Request
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
            'patient'           => 'required',
            'clinical_history'  => 'required',
            'specimen'          => 'required',
            'diagnosis'         => 'required',
            'gross_description' => 'required',

        ];
    }
}
