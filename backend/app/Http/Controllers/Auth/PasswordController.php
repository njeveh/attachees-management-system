<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{

    /**
     * Display the password change view.
     */
    public function show(Request $request): View
    {
        return view('auth.change-password');
    }
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        Log::info('pass');
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        Log::info('pass2');
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    /**
     * Change the user's password.
     */
    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password updated successfully');
    }

    /**
     * show the form where admins can reset user passwords
     */
    public function showAdminPasswordResetForm(Request $request, $id): View
    {
        return View('central_services.password-reset', ['id' => $id]);
    }

    /**
     * handle admin request to reset password
     */
    public function adminPasswordReset(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        User::where('id', $request->id)->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password updated successfully');
    }
}