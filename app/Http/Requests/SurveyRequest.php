<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SurveyRequest extends FormRequest
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
        dd($this->all());
        return [
            'options.*.question_id'=>'required',
            'options.*.option_id'=>Rule::requiredIf(function ($value, $key, $attribute) {
                $otherValue = request()->input('options.' . $key . '.option_other');
                return is_null($otherValue);
            }),
            'options.*.option_other'=>Rule::requiredIf(function ($value, $key, $attribute) {
                $otherValue = request()->input('options.' . $key . '.option_id');
                return is_null($otherValue);
            }),
        ];
    }
}
