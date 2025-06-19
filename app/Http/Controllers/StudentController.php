<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'siswa')->get();
        return view('students.index', compact('students'));
    }

    public function store(Request $request)
    {
        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'siswa', 
            'name' => $request->input('name'),
            'nis' => $request->input('nis'),
            'class' => $request->input('class'),
        ]);

        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function update(Request $request, User $student)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'nis' => 'nullable|string',
            'class' => 'nullable|string',
        ]);

        if ($request->input('username') && $request->input('username') !== $student->username) {
            $request->validate(['username' => 'unique:users,username']);
            $student->username = $request->input('username');
        }

        if ($request->input('email') && $request->input('email') !== $student->email) {
            $request->validate(['email' => 'unique:users,email']);
            $student->email = $request->input('email');
        }
        if ($request->input('password')) {
            $request->validate(['password' => 'min:8|confirmed']);
            $student->password = Hash::make($request->input('password'));
        }
        if ($request->input('role') && $request->input('role') !== $student->role) {
            $request->validate(['role' => 'in:admin,siswa']);
            $student->role = $request->input('role');
        }
        $student->update([
            'name' => $request->input('name'),
            'nis' => $request->input('nis'),
            'class' => $request->input('class'),
        ]);

        return redirect()->route('students.index')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy(User $student)
    {
        if (Auth::id() === $student->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus!');
    }
}
