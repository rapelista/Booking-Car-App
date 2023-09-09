<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fuel_usage.*.amount' => 'required|numeric|min:2',
            'fuel_usage.*.fuel_type' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'fuel_usage.*.amount' => 'Minimum usage of fuel is 2',
            'fuel_usage.*.fuel_type' => 'Please select fuel type',
        ];
    }
}
