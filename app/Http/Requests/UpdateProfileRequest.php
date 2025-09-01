<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Only authenticated users can update their own profile
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'staff_id'          => ['nullable','string','max:100'],
            'full_name'         => ['nullable','string','max:255'],
            'designation'       => ['nullable','string','max:255'],
            'section'           => ['nullable','string','max:255'],
            'email'             => ['nullable','email','max:255'],
            'phone'             => ['nullable','string','max:50'],
            'office_location'   => ['nullable','string','max:255'],
            'joining_date'      => ['nullable','date'],
            'office_name'       => ['nullable','string','max:255'],
            'directorate_name'  => ['nullable','string','max:255'],
            'division_name'     => ['nullable','string','max:255'],
            'district_name'     => ['nullable','string','max:255'],

            // Image: up to 2MB, common types
            'profile_photo'     => ['nullable','image','mimes:jpeg,png,jpg,webp,avif','max:2048'],
        ];
    }

    /**
     * Massage/normalize input before validation (optional).
     */
    protected function prepareForValidation(): void
    {
        // Trim strings
        $this->merge([
            'staff_id' => $this->string('staff_id')->trim()->value(),
            'full_name' => $this->string('full_name')->trim()->value(),
            'designation' => $this->string('designation')->trim()->value(),
            'section' => $this->string('section')->trim()->value(),
            'email' => $this->string('email')->trim()->lower()->value(),
            'phone' => $this->string('phone')->trim()->value(),
            'office_location' => $this->string('office_location')->trim()->value(),
            'office_name' => $this->string('office_name')->trim()->value(),
            'directorate_name' => $this->string('directorate_name')->trim()->value(),
            'division_name' => $this->string('division_name')->trim()->value(),
            'district_name' => $this->string('district_name')->trim()->value(),
        ]);
    }
}
