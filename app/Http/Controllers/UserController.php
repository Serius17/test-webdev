<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_departement' => 'required',
        ]);

        $user = new User([
            'id_user' => uniqid(),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'id_departement' => $request->get('id_departement'),
        ]);

        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show($id_user)
    {
        $user = User::find($id_user)
            ->with('relasi', function ($query) {
                $query->with('project')->where('id_user', 'id_user');
            })
            ->with('departement')->where('id_user', $id_user);

        return view('user.show', compact('user'));
    }

    public function edit($id_user)
    {
        $user = User::find($id_user);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id_user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_departement' => 'nullable',
        ]);

        $user = User::find($id_user);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->id_departement = $request->get('id_departement');
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id_user)
    {
        $user = User::find($id_user);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function viewLogin()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, alihkan ke halaman yang sesuai
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
