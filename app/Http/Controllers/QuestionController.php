<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(10);
        return view('questions.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'nullable',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'option_a' => 'nullable|string|max:255',
            'option_b' => 'nullable|string|max:255',
            'option_c' => 'nullable|string|max:255',
            'option_d' => 'nullable|string|max:255',
        ]);

        Question::create([
            'type' => $request->input('type'),
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'option_a' => $request->input('option_a'),
            'option_b' => $request->input('option_b'),
            'option_c' => $request->input('option_c'),
            'option_d' => $request->input('option_d'),
        ]);

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'nullable',
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'option_a' => 'nullable|string|max:255',
            'option_b' => 'nullable|string|max:255',
            'option_c' => 'nullable|string|max:255',
            'option_d' => 'nullable|string|max:255',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'type' => $request->input('type'),
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'option_a' => $request->input('option_a'),
            'option_b' => $request->input('option_b'),
            'option_c' => $request->input('option_c'),
            'option_d' => $request->input('option_d'),
        ]);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
