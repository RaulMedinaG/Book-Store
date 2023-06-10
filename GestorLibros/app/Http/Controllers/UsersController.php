<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        $usersList = User::all();
        return view('users.allusers', ['usersList' => $usersList]);
    }

    public function create()
    {
        $users = User::all();
        return view('users.create', ['users' => $users]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'admin' => 'N',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $r, $id)
    {
        $user = User::find($id);
        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = password_hash($r->password, PASSWORD_DEFAULT);
        $user->save();
        return redirect()->route('usuario.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('usuario.index');
    }

}
