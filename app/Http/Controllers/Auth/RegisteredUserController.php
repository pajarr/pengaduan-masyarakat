<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Petugas;
use App\Models\Masyarakat;
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
        return view('admin.register');
    }
    public function createMasyarakat(): View
    {
        return view('masyarakat.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            
            // 'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:255'],
            // 'telp' => ['required', 'integer', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Petugas::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'max:15']
        ]);

        $petugas = Petugas::create([
            
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
            'role' => $request->level
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        event(new Registered($user, $petugas));

        return redirect('login');
    }

    public function storeMasyarakat(Request $request): RedirectResponse
    {
        $request->validate([
            
            // 'name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:255'],
            // 'telp' => ['required', 'integer', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Petugas::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'role' => ['required', 'string', 'max:15']
        ]);

        $petugas = Masyarakat::create([            
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
            'role' => 'Masyarakat'
        ]);

        event(new Registered($user, $petugas));

        return redirect('login');
    }
}
