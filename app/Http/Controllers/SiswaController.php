<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Material;
use App\Models\Question;
use App\Models\Prediction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        // $questionCount = Question::count();

        // $visualCount = Question::where('material_id', $material->id)
        //     ->whereHas('material', function($query) {
        //         $query->where('type', 'visual');
        //     })
        //     ->count();

        // $auditoryCount = Question::where('material_id', $material->id)
        //     ->whereHas('material', function($query) {
        //         $query->where('type', 'auditory');
        //     })
        //     ->count();

        // $kinestheticCount = Question::where('material_id', $material->id)
        //     ->whereHas('material', function($query) {
        //         $query->where('type', 'kinesthetic');
        //     })
        //     ->count();

        return view('materi-detail', compact('material', 'materials'));
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
            ->with('question')
            ->get();

        if ($answers->isEmpty()) {
            Alert::error('Prediksi Gagal', 'Anda belum mengisi kuisioner!');
            return redirect()->route('siswa.kuisioner');
        }

        [$predictedType, $typeScores] = $this->predictUsingRuleBasedTree($answers);

        $totalCorrect = array_sum($typeScores);
        $totalQuestions = $answers->count();
        $totalWrong = $totalQuestions - $totalCorrect;

        $typePercentages = collect($typeScores)->map(function ($count) use ($totalCorrect) {
            return $totalCorrect > 0 ? round(($count / $totalCorrect) * 100, 2) : 0;
        });

        $wrongAnswers = $answers->filter(function ($answer) {
            return $answer->answer !== $answer->question->answer;
        });

        Prediction::create([
            'user_id' => Auth::id(),
            'result' => $predictedType,
            'visual' => $typePercentages->get('visual', 0),
            'auditory' => $typePercentages->get('auditory', 0),
            'kinesthetic' => $typePercentages->get('kinesthetic', 0),
            'total_correct' => $totalCorrect,
            'total_wrong' => $totalWrong,
        ]);

        $suggestedMaterials = Material::where('type', $predictedType)->get();

        return view('prediksi', compact(
            'answers',
            'predictedType',
            'typePercentages',
            'wrongAnswers',
            'suggestedMaterials'
        ));
    }


    public function predictUsingRuleBasedTree($answers)
    {
        $typeScores = [
            'visual' => 0,
            'auditory' => 0,
            'kinesthetic' => 0,
        ];

        foreach ($answers as $answer) {
            $trueAnswer = $answer->question->answer;
            $materialType = $answer->question->type;

            if (isset($typeScores[$materialType])) {
                if ($answer->answer === $trueAnswer) {
                    $typeScores[$materialType] += 1;
                }
            }
        }

        arsort($typeScores);
        $predictedType = array_key_first($typeScores);

        return [$predictedType, $typeScores];
    }


    public function resetPrediksi()
    {
        Answer::where('user_id', Auth::id())->delete();

        Alert::success('Berhasil', 'Jawaban berhasil direset!');

        return redirect()->route('siswa.kuisioner')->with('success', 'Prediksi berhasil direset.');
    }

    public function profile()
    {
        $user = Auth::user();
         return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'nis' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->nis = $validated['nis'];
        $user->class = $validated['class'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('siswa.profile')->with('success', 'Profil berhasil diperbarui.');
    }

}
