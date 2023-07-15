<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectionRequest extends FormRequest
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
            'section_e' => ['required', 'string', 'max:255', Rule::unique('sections', 'section_e')->ignore($this->section)],
            'section_u' => ['required', 'string', 'max:255', Rule::unique('sections', 'section_u')->ignore($this->section)],
            'section_desc_e'=>'sometimes|nullable',
            'section_desc_u'=>'sometimes|nullable',
        ];
    }
}
