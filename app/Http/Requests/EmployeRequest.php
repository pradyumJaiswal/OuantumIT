<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
            'profile' => 'required',
            'fName' => 'required|string|max:255',
            'lName' => 'required|string|max:255',
            'Company' => 'required|string|max:255',
            'Email' => 'required|email|unique:employees|max:255',
            'Phone' => 'required|string|max:20',

        ];
    }
}
