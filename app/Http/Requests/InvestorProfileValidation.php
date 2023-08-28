<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestorProfileValidation extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'nid' => 'required_without:birth_c',
            'birth_c' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'conuntry' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ];
    }
}
