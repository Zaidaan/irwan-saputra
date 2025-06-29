<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill; // Import your Skill model
use Illuminate\Support\Facades\Session;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource (all skills).
     */
    public function index()
    {
        $skills = Skill::orderBy('name')->paginate(10); // Order alphabetically by name
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:skills,name', // Skill name must be unique
            'proficiency' => 'nullable|integer|min:0|max:100', // Percentage 0-100
        ]);

        Skill::create($validatedData);

        Session::flash('success', 'Skill added successfully!');
        return redirect()->route('admin.skills.index');
    }

    /**
     * Display the specified resource. (Optional for a single skill view)
     */
    public function show(Skill $skill)
    {
        // return view('admin.skills.show', compact('skill'));
        return redirect()->route('admin.skills.edit', $skill->id); // Often just redirect to edit form
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:skills,name,' . $skill->id, // Unique except for current skill
            'proficiency' => 'nullable|integer|min:0|max:100',
        ]);

        $skill->update($validatedData);

        Session::flash('success', 'Skill updated successfully!');
        return redirect()->route('admin.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        Session::flash('success', 'Skill deleted successfully!');
        return redirect()->route('admin.skills.index');
    }
}