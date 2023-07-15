<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
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
            'section_id'=>'required',
            'question_type'=>'required',
            'question_e' => ['required', 'string', 'max:255', Rule::unique('questions', 'question_e')->ignore($this->question)],
            'question_u' => ['required', 'string', 'max:255', Rule::unique('questions', 'question_u')->ignore($this->question)],
            'options'=> 'required_unless:question_type,TextField|array'
        ];
    }
}
