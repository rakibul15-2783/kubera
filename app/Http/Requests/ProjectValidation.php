<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectValidation extends FormRequest
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
            'project_title' => 'required|string|max:255',
            'project_category' => 'required|string|max:255',
            'description' => 'required|string',
            'current_status' => 'required|in:0,1',
            'estimate_budget' => 'required|numeric',
            'is_donated' => 'required|boolean',
            'donation_amount' => 'nullable|numeric',
            'prcentage_of_completion' => 'required|integer|min:0|max:100',
            'team_members' => 'required|string',
            'your_role' => 'required|string|max:255',
            'document' => 'nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg',
        ];
    }
}
