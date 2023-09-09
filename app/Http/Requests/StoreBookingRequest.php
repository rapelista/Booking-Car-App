<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
        $this->merge([
            'approver' => array_filter($this->approver, function ($approver) {
                return is_numeric($approver);
            }),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // dd($this->all());

        return [
            'car' => 'exists:cars,id',
            'driver' => 'exists:drivers,id',
            'operation_date' => 'date_format:Y-m-d',
            'approver' => 'array|min:2'
        ];
    }

    public function messages(): array
    {
        return [
            'car.exists' => 'Please select car',
            'driver.exists' => 'Please select driver',
            'approver.min' => 'Please at least select 2 approvers'
        ];
    }
}
