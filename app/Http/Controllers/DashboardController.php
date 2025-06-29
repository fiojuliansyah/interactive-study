<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $materialCount = Material::count();
        $questionCount = Question::count();
        $studentCount = User::where('role', 'siswa')->count();
        $adminCount = User::where('role', 'admin')->count();
        return view('dashboard',compact('materialCount', 'questionCount', 'studentCount', 'adminCount'));
    }

    public function hasilSiswa()
    {
        $materialCount = Material::count();
        $questionCount = Question::count();
        $studentCount = User::where('role', 'siswa')->count();
        $adminCount = User::where('role', 'admin')->count();
        return view('dashboard',compact('materialCount', 'questionCount', 'studentCount', 'adminCount'));
    }
}
