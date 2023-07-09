<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SurveyController extends Controller
{
    public function index()
    {
        $sections = Section::with('questions.options')->get();

        $options = $sections->map(function (section) )
        return Inertia::render('Survey', ['sections' => $sections]);
    }
}
