<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index(Request $request)
    {
        $query = User::with('roles');
        
        // Search functionality (case-insensitive)
        if ($request->has('search') && $request->search) {
            $searchTerm = strtolower($request->search);
            $query->where(function($q) use ($searchTerm) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$searchTerm}%"])
                  ->orWhereRaw('LOWER(email) LIKE ?', ["%{$searchTerm}%"])
                  ->orWhereRaw('LOWER(staff_id) LIKE ?', ["%{$searchTerm}%"]);
            });
        }
        
        $users = $query->paginate(15)->withQueryString();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'staff_id' => 'required|string|max:255|unique:users',
            'designation' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'directorate_name' => 'nullable|string|max:255',
            'office_name' => 'nullable|string|max:255',
            'division_name' => 'nullable|string|max:255',
            'district_name' => 'nullable|string|max:255',
            'office_location' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'joining_date' => 'nullable|date',
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'staff_id' => $request->staff_id,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'directorate_name' => $request->directorate_name,
            'office_name' => $request->office_name,
            'division_name' => $request->division_name,
            'district_name' => $request->district_name,
            'office_location' => $request->office_location,
            'section' => $request->section,
            'joining_date' => $request->joining_date,
        ]);

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user
     */
    public function show(User $user)
    {
        $user->load('roles', 'permissions');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoles = $user->getRoleNames()->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified user
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'staff_id' => 'required|string|max:255|unique:users,staff_id,' . $user->id,
            'designation' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'directorate_name' => 'nullable|string|max:255',
            'office_name' => 'nullable|string|max:255',
            'division_name' => 'nullable|string|max:255',
            'district_name' => 'nullable|string|max:255',
            'office_location' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'joining_date' => 'nullable|date',
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'staff_id' => $request->staff_id,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'directorate_name' => $request->directorate_name,
            'office_name' => $request->office_name,
            'division_name' => $request->division_name,
            'district_name' => $request->district_name,
            'office_location' => $request->office_location,
            'section' => $request->section,
            'joining_date' => $request->joining_date,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        // Update roles
        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        } else {
            $user->syncRoles([]);
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user
     */
    public function destroy(User $user)
    {
        // Prevent deletion of SuperAdmin users
        if ($user->hasRole('SuperAdmin')) {
            return redirect()->back()
                ->with('error', 'Cannot delete SuperAdmin users.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Show user permissions management
     */
    public function permissions(User $user)
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->name)[0];
        });
        
        $userPermissions = $user->getAllPermissions()->pluck('name')->toArray();
        
        return view('admin.users.permissions', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * Update user permissions
     */
    public function updatePermissions(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $permissions = $request->permissions ?? [];
        $user->syncPermissions($permissions);

        return redirect()->route('admin.users.show', $user)
            ->with('success', 'User permissions updated successfully.');
    }
}
