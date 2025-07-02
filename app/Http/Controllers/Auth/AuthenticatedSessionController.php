<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            // Proses autentikasi
            $request->authenticate();

            // Regenerasi sesi untuk meningkatkan keamanan
            $request->session()->regenerate();

            // Ambil user yang sedang login
            $user = Auth::user();

            // Cek peran user dan arahkan sesuai dengan role
            if ($user->role === 'siswa') {
                Alert::success('Berhasil', 'Berhasil Login!');
                return redirect()->route('siswa.dashboard')
                                ->with('success', 'Login berhasil. Selamat datang, Siswa!');
            } elseif ($user->role === 'admin') {
                Alert::success('Berhasil', 'Berhasil Login!');
                return redirect()->route('dashboard')
                                ->with('success', 'Login berhasil. Selamat datang, Admin!');
            }

            // Jika role tidak dikenali
            return redirect('/')
                ->with('error', 'Role tidak dikenali. Hubungi administrator.');

        } catch (\Exception $e) {
            // Menangani error yang mungkin terjadi selama autentikasi
            return redirect()->back()
                ->withErrors(['login_error' => 'Gagal melakukan login. Periksa kembali kredensial Anda.']);
        }
    }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Logout berhasil. Sampai jumpa lagi!');
    }
}
