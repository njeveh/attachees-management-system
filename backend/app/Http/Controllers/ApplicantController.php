<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class ApplicantController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('auth.applicant-registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'national_id' => ['required', 'string', 'unique:applicants,national_id'],
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'second_name' => ['required', 'string', 'min:2', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10', 'max:15'],
            'institution' => [
                'required',
                'string',
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
                'type' => 1,
                'is_active' => 1,
            ]);
            $applicant = Applicant::create([
                'user_id' => $user->id,
                'national_id' => $request->national_id,
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'phone_number' => $request->phone_number,
                'institution' => $request->institution,
                'engagement_level' => 0,
            ]);
            event(new Registered($user));
            Auth::login($user);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with(
                'error',
                'Sorry!! Something went wrong.'
            )->withInput();
        }

        return redirect()->route('attachee.home', );
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}