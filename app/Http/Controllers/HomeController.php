<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Blog;
use App\Models\Skill;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\BlogController;

class HomeController extends Controller{
    public function index(){
        $works = Work::with('skills')->take(4)->get();

        $blogs = Blog::orderByDesc('created_at')->take(3)->get();

        $skills = Skill::orderBy('proficiency', 'desc')->get();

        return view('home', compact('works', 'blogs', 'skills'));
    }

    public function allWorks()
    {
        // Fetch all works, eager load skills. You can add pagination here too.
        $works = Work::with('skills')->orderBy('started_at', 'desc')->paginate(9);
        // For pagination: $works = Work::with('skills')->orderBy('started_at', 'desc')->paginate(9);
        return view('works.index', compact('works'));
    }
}
?>
