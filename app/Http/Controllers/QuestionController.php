<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\AnswerOption;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('answeroptions')->get();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'QuestionText' => 'required|string',
            'Category' => 'nullable|string',
            'answeroptions.*.OptionText' => 'required|string',
            'answeroptions.*.SkinTypeEffect' => 'nullable|string',
            'answeroptions.*.SeverityEffect' => 'nullable|string',
            'answeroptions.*.Score' => 'nullable|integer',
        ]);

        $question = Question::create($request->only(['QuestionText', 'Category']));

        if ($request->has('answeroptions')) {
            foreach ($request->input('answeroptions') as $optionData) {
                $question->answeroptions()->create($optionData);
            }
        }

        return redirect()->route('questions.index')->with('success', 'Question added successfully.');
    }

    public function edit(Question $question)
    {
        $question->load('answeroptions');
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'QuestionText' => 'required|string',
            'Category' => 'nullable|string',
            'answeroptions.*.OptionID' => 'nullable|integer',
            'answeroptions.*.OptionText' => 'required|string',
            'answeroptions.*.SkinTypeEffect' => 'nullable|string',
            'answeroptions.*.SeverityEffect' => 'nullable|string',
            'answeroptions.*.Score' => 'nullable|integer',
        ]);

        $question->update($request->only(['QuestionText', 'Category']));

        if ($request->has('answeroptions')) {
            $newOptions = collect($request->input('answeroptions'))->keyBy('OptionID');

            $question->answeroptions->each(function ($answerOption) use ($newOptions) {
                if ($newOptions->has($answerOption->OptionID)) {
                    $answerOption->update($newOptions->get($answerOption->OptionID));
                    $newOptions->forget($answerOption->OptionID);
                } else {
                    $answerOption->delete();
                }
            });

            $newOptions->each(function ($optionData) use ($question) {
                $question->answeroptions()->create($optionData);
            });
        }

        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}