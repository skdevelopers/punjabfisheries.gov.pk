<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HatcheryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'hatchery_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'office_number' => 'nullable|string|max:20',
            'division' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'longitude' => 'nullable|numeric|between:-180,180',
            'latitude' => 'nullable|numeric|between:-90,90',
            'office_type' => 'required|in:HM,AQUA,BOTH',
        ];

        // Conditional validation for DD/ADF fields when office_type is BOTH
        if ($this->input('office_type') === 'BOTH') {
            $rules['dd_adf_name'] = 'required|string|max:255';
            $rules['dd_adf_contact_number'] = 'required|string|max:20';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'hatchery_name.required' => 'Hatchery name is required.',
            'contact_person.required' => 'Contact person is required.',
            'mobile_number.required' => 'Mobile number is required.',
            'division.required' => 'Division is required.',
            'district.required' => 'District is required.',
            'office_type.required' => 'Office type is required.',
            'office_type.in' => 'Office type must be HM, AQUA, or BOTH.',
            'dd_adf_name.required' => 'DD/ADF name is required when both office types are selected.',
            'dd_adf_contact_number.required' => 'DD/ADF contact number is required when both office types are selected.',

        ];
    }
}
