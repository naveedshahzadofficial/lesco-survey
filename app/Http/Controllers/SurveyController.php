<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Section;
use App\Models\Survey;
use Inertia\Inertia;

class SurveyController extends Controller
{
    public function index()
    {
        $sections = Section::with('questions.options')->get();
        return Inertia::render('Survey', ['sections' => $sections]);
    }

    public function store(SurveyRequest $request)
    {
        foreach ($request->options as $option) {
            Survey::updateOrCreate([
                'user_id' => auth()->id(),
                'question_id' => $option['question_id']
            ],
            [
                'question_id' => $option['question_id'],
                'option_id' => $option['option_id'],
                'option_other' => $option['option_other'],
            ]
            );
        }
        session()->flash('success', "Your feedback has been submitted successfully.");
        return redirect()->route('thank-you');
    }

    public function thank_you()
    {
        return Inertia::render('ThankYou');
    }
}
