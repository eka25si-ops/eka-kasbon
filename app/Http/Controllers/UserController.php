<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    private function messages()
    {
        return [
            'required'  => ':attribute wajib diisi.',
            'email'     => 'Format :attribute tidak valid.',
            'unique'    => ':attribute sudah dipakai.',
            'min'       => ':attribute minimal :min karakter.',
            'max'       => ':attribute terlalu panjang.',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
        ];
    }

    private function attributes()
    {
        return ['name' => 'Nama', 'email' => 'Email', 'password' => 'Password'];
    }

    public function index()
    {
        $users = User::latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], $this->messages(), $this->attributes());

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|min:6|confirmed',
        ], $this->messages(), $this->attributes());

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')
                ->with('success', 'Data user berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')
                ->with('error', 'Data user gagal dihapus.');
        }
    }
}
