<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $materialCount = Material::count();
        $questionCount = Question::count();
        return view('siswa.dashboard',compact('materialCount', 'questionCount'));
    }

    public function materi()
    {
        $materials = Material::all();
        return view('siswa.materi',compact('materials'));
    }

    public function kuisioner()
    {
        $questions = Question::all();
        return view('siswa.kuisioner', compact('questions'));
    }

    public function kuisionerSubmit(Request $request)
    {
        $answers = $request->input('answers');
        
        foreach ($answers as $questionId => $answer) {
            Answer::create([
                'question_id' => $questionId,
                'answer' => $answer,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Jawaban berhasil disimpan.');
    }
}
