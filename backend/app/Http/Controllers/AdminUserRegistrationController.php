<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentAdmin;
use App\Models\DipcaAdmin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserRegistrationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new department admin.
     */
    public function getDepartmentAdminCreationForm()
    {
        $departments = Department::all();
        return view('central_services.department-admin-creation', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new department admin.
     */
    public function getDipcaAdminCreationForm(): View
    {
        return view('central_services.dipca-admin-creation');
    }

    /**
     * Create a new department admin account.
     */
    public function storeDepartmentAdmin(Request $request)
    {
        $request->validate([
            'staff_id' => ['required', 'string', 'unique:department_admins'],
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:2', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'max:15'],
            'department' => [
                'required',
                'exists:departments,id',
            ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->first_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 3,
                'is_active' => 1,
            ]);
            $department_admin = DepartmentAdmin::create([
                'user_id' => $user->id,
                'department_id' => $request->department,
                'staff_id' => $request->staff_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]);
            event(new Registered($user));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(
                'error',
                'Sorry!! Something went wrong.'
            )->withInput();
        }

        return back()->with('status', 'Account created successfully');
    }

    /**
     * Create a new dipca admin account.
     */
    public function storeDipcaAdmin(Request $request)
    {
        $request->validate([
            'staff_id' => ['required', 'string', 'unique:dipca_admins,staff_id'],
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:2', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->first_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 2,
                'is_active' => 1,
            ]);
            $dipca_admin = DipcaAdmin::create([
                'user_id' => $user->id,
                'staff_id' => $request->staff_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]);
            event(new Registered($user));
            DB::commit();
        } catch (\Exception $e) {
            \Log::info($e);
            DB::rollBack();
            return back()->with(
                'error',
                'Sorry!! Something went wrong.'
            )->withInput();
        }

        return back()->with('status', 'Account created successfully');
    }

}