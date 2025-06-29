<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Material;
use App\Models\Question;
use App\Models\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $materials = Material::all();
        return view('home',compact('materials'));
    }

    public function materi(Request $request)
    {
        $search = $request->input('search');

        $materials = Material::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%$search%")
                        ->orWhere('type', 'like', "%$search%");
        })->get()->groupBy('type');

        return view('materi', compact('materials'));
    }

    public function materiDetail($id)
    {
        $material = Material::findOrFail($id);
        $materials = Material::all();
        $questionCount = Question::count();

        $visualCount = Question::where('material_id', $material->id)
            ->whereHas('material', function($query) {
                $query->where('type', 'visual');
            })
            ->count();

        $auditoryCount = Question::where('material_id', $material->id)
            ->whereHas('material', function($query) {
                $query->where('type', 'auditory');
            })
            ->count();

        $kinestheticCount = Question::where('material_id', $material->id)
            ->whereHas('material', function($query) {
                $query->where('type', 'kinesthetic');
            })
            ->count();

        return view('materi-detail', compact('material', 'materials', 'questionCount', 'visualCount', 'auditoryCount', 'kinestheticCount'));
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

        Alert::success('Selamat', 'Jawaban berhasil disimpan. Ini hasil Prediksi kamu!');

        return redirect()->route('siswa.prediksi')->with('success', 'Jawaban berhasil disimpan.');
    }

    public function kuisionerHasil()
    {
        $answers = Answer::where('user_id', Auth::id())
                        ->with('question.material')
                        ->get();

        if ($answers->isEmpty()) {
            Alert::error('Prediksi Gagal', 'Anda belum mengisi kuisioner!');
            return redirect()->route('siswa.kuisioner')->with('error', 'Anda belum mengisi kuisioner.');
        }

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

        if ($totalCorrect > 0) {
            Prediction::create([
                'user_id' => Auth::id(),
                'result' => $predictedType,
                'visual' => $typePercentages->get('visual', 0),
                'auditory' => $typePercentages->get('auditory', 0),
                'kinesthetic' => $typePercentages->get('kinesthetic', 0),
                'total_correct' => $totalCorrect,
                'total_wrong' => $answers->count() - $totalCorrect,
            ]);
        }

        $suggestedMaterials = $predictedType 
            ? Material::where('type', $predictedType)->get()
            : collect();

        return view('prediksi', compact('answers', 'predictedType', 'typePercentages', 'wrongAnswers', 'suggestedMaterials'));
    }

    public function resetPrediksi()
    {
        Answer::where('user_id', Auth::id())->delete();

        Alert::success('Berhasil', 'Jawaban berhasil direset!');

        return redirect()->route('siswa.kuisioner')->with('success', 'Prediksi berhasil direset.');
    }

}
