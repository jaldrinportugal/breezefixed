<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'usertype' => ['required', 'string', 'in:patient,dentistrystudent'], // Add validation for usertype
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype, // Store usertype
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect based on usertype
        switch ($user->usertype) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;
            case 'patient':
                return redirect()->route('patient.appointment');
                break;
            case 'dentistrystudent':
                return redirect()->route('dentistrystudent.communityforum');
                break;
            default:
                return redirect(RouteServiceProvider::HOME);
        }
    }
}
