<?php

namespace App\Http\Controllers;

use App\Models\Attachee;
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

class AttacheeController extends Controller
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
      return view('auth.attachee-registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'national_id' => ['required', 'string'],
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'second_name' => ['required', 'string', 'min:2', 'max:255'],
            'institution' => ['required', 'string',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
         DB::beginTransaction();
            try{
                $user = User::create([
                    'name' => $request->first_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'type' => 1,
                ]);
                $attachee = Attachee::create([
                    'user_id' => $user->id,
                    'national_id'=> $request->national_id,
                    'first_name' => $request->first_name,
                    'second_name' => $request->second_name,
                    'institution' => $request->institution,
                ]);
        DB::commit();
                event(new Registered($user));
            } catch (\Exception $e) {
                DB::rollBack();
                        return back()->with(
            'error', 'Sorry!! Something went wrong.'
        )->withInput();
                        }

        return redirect()->route('registration.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attachee $attachee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attachee $attachee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attachee $attachee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attachee $attachee)
    {
        //
    }
}
