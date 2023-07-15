<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Sections/Index', [
            'sections' => SectionResource::collection(Section::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Sections/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        Section::create($request->validated());
        return to_route('sections.index')->with('success', 'Section has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return Inertia::render('Admin/Sections/Edit', [
            'section' => new SectionResource($section)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return to_route('sections.index')->with('success', 'Section has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return back()->with('success', 'Section has been deleted successfully!');
    }
}
