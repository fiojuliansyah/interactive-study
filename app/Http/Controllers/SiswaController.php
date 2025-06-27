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
        $materials = Material::all();
        return view('welcome',compact('materials'));
    }

    public function materi()
    {
        $materials = Material::all();
        return view('siswa.materi',compact('materials'));
    }

    public function kuisioner()
    {
        $questions = Question::all();
        return view('kuisioner', compact('questions'));
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

        return redirect()->route('siswa.prediksi')->with('success', 'Jawaban berhasil disimpan.');
    }

    public function kuisionerHasil()
    {
        $answers = Answer::where('user_id', Auth::id())
                        ->with('question.material')
                        ->get();

        $allTypes = $answers->pluck('question.material.type')->unique();

        $correctAnswers = $answers->filter(function ($answer) {
            return $answer->answer === $answer->question->answer;
        });

        $totalCorrect = $correctAnswers->count();

        $typeCounts = $correctAnswers->groupBy(function ($answer) {
            return $answer->question->material->type;
        })->map->count();

        $typePercentages = collect($allTypes)->mapWithKeys(function ($type) use ($typeCounts, $totalCorrect) {
            $count = $typeCounts[$type] ?? 0;
            $percentage = $totalCorrect > 0 ? round(($count / $totalCorrect) * 100, 2) : 0;
            return [$type => $percentage];
        });

        $predictedType = $typeCounts->sortDesc()->keys()->first();

        $wrongAnswers = $answers->filter(function ($answer) {
            return $answer->answer !== $answer->question->answer;
        });

        return view('prediksi', compact('answers', 'predictedType', 'typePercentages', 'wrongAnswers'));
    }

    public function resetPrediksi()
    {
        Answer::where('user_id', Auth::id())->delete();

        return redirect()->route('siswa.prediksi')->with('success', 'Prediksi berhasil direset.');
    }

}
