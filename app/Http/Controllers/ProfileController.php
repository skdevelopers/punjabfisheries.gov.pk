<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Update the authenticated user's profile.
     *
     * Accepts multipart/form-data for image upload (profile_photo) and
     * regular text fields for staff information.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        /** @var \App\Models\User&Authenticatable $user */
        $user = $request->user();

        // Validate & normalize payload
        $data = $request->validated();

        // Map fields
        $user->fill([
            'staff_id'         => $data['staff_id']         ?? $user->staff_id,
            'name'             => $data['full_name']        ?? $user->name,
            'designation'      => $data['designation']      ?? $user->designation,
            'section'          => $data['section']          ?? $user->section,
            'phone'            => $data['phone']            ?? $user->phone,
            'office_location'  => $data['office_location']  ?? $user->office_location,
            'joining_date'     => $data['joining_date']     ?? $user->joining_date,
            'office_name'      => $data['office_name']      ?? $user->office_name,
            'directorate_name' => $data['directorate_name'] ?? $user->directorate_name,
            'division_name'    => $data['division_name']    ?? $user->division_name,
            'district_name'    => $data['district_name']    ?? $user->district_name,
        ]);

        // Email change (optional)
        if (!empty($data['email']) && $data['email'] !== $user->email) {
            $user->email = $data['email'];
        }

        // Photo upload
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return response()->json([
            'success'       => true,
            'message'       => 'Profile updated successfully.',
            'profile_photo' => $user->profile_photo_path ? Storage::url($user->profile_photo_path) : null,
            'name'          => $user->name, // optional: you console.log(data.name)
        ]);
    }
}
