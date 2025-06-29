<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('created_at')->paginate(10); // Paginate for admin list
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create() { return view('admin.blogs.create'); }

    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 2. Create a new Blog record in the database
        Blog::create($validatedData);

        // 3. Redirect back to the index page with a success message
        Session::flash('success', 'Blog post added successfully!');
        return redirect()->route('admin.blogs.index');
    }

    public function update(Request $request, Blog $blog) // Using Route Model Binding
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($validatedData); // Update the blog post

        Session::flash('success', 'Blog post updated successfully!');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog) // Using Route Model Binding
    {
        $blog->delete(); // Delete the blog post

        Session::flash('success', 'Blog post deleted successfully!');
        return redirect()->route('admin.blogs.index');
    }
}
