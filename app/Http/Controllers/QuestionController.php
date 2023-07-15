<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\SectionResource;
use App\Models\Option;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Questions/Index', [
            'questions' => QuestionResource::collection(Question::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Questions/Create', [
            'sections' => SectionResource::collection(Section::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
       $question = Question::create($request->safe()->except('options'));
       if($question->question_type != 'TextField'){
           $options = collect($request->options)->map(fn($option) => new Option($option));
           $question->options()->saveMany($options);
       }
        return to_route('questions.index')->with('success', 'Question has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $question->load('options');
        return Inertia::render('Admin/Questions/Edit', [
            'sections' => SectionResource::collection(Section::all()),
            'question' => new QuestionResource($question)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        if($question->question_type != 'TextField'){
            foreach (collect($request->options) as $option){
                Option::updateOrCreate(
                    ['id' => $option['id']??null],
                    $option + ['question_id'=> $question->id]
                );
            }
        }
        return to_route('questions.index')->with('success', 'Question has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('success', 'Question has been deleted successfully!');

    }

    public function destroyOption(Question $question, Option $option)
    {
        $option->delete();
        return back()->with('success', 'Option has been deleted successfully!');

    }
}
