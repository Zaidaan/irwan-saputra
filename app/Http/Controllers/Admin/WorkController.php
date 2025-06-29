<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Skill; //
use Illuminate\Support\Facades\Session;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();
        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::orderBy('name')->get(); // <--- Fetch all available skills
        return view('admin.works.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'started_at' => 'nullable|date',
            'ended_at' => 'nullable|date|after_or_equal:started_at',
            'description' => 'required|string',
            'image_alt' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'skill_ids' => 'nullable|array', 
            'skill_ids.*' => 'integer|exists:skills,id', 
        ]);

        // No need to process skills string here, as we're now getting IDs directly
        unset($validatedData['skill_ids']); // Remove skill_ids from $validatedData before creating Work

        $work = Work::create($validatedData); // Create the work

        // Attach skills to the work
        if (isset($request->skill_ids)) {
            $work->skills()->attach($request->skill_ids); // Attach selected skills
        }

        Session::flash('success', 'Work added successfully!');
        return redirect()->route('admin.works.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work) // Using Route Model Binding for convenience
    {
     $skills = Skill::orderBy('name')->get(); // <--- Fetch all available skills
        // Get IDs of skills already attached to this work
        $attachedSkillIds = $work->skills->pluck('id')->toArray();

        return view('admin.works.edit', compact('work', 'skills', 'attachedSkillIds'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Work $work) // Using Route Model Binding
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'started_at' => 'nullable|date',
            'ended_at' => 'nullable|date|after_or_equal:started_at',
            'description' => 'required|string',
            'image_alt' => 'nullable|string|max:255',
            'image_url' => 'nullable|string|max:255',
            'skill_ids' => 'nullable|array',
            'skill_ids.*' => 'integer|exists:skills,id',
        ]);

        // Remove skill_ids from $validatedData before updating Work
        unset($validatedData['skill_ids']);

        $work->update($validatedData); // Update the work

        // Sync skills to the work (detach old, attach new)
        $work->skills()->sync($request->skill_ids ?? []); // sync handles detach/attach gracefully

        Session::flash('success', 'Work updated successfully!');
        return redirect()->route('admin.works.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work) // Using Route Model Binding
    {
        // Detach skills first (Laravel's onDelete('cascade') in migration should handle this,
        // but explicit detach is safer if you customize cascade behavior)
        $work->skills()->detach(); // Detach all related skills from pivot table

        $work->delete();

        Session::flash('success', 'Work deleted successfully!');
        return redirect()->route('admin.works.index');
    }
}
