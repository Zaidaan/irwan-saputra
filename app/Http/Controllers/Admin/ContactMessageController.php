<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage; // Import your ContactMessage model
use Illuminate\Support\Facades\Session;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource (all contact messages).
     */
    public function index()
    {
        // Fetch all contact messages, ordered by newest first, with pagination
        $messages = ContactMessage::orderByDesc('created_at')->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource. (Optional for viewing a single message detail)
     */
    public function show(ContactMessage $message) // Using Route Model Binding
    {
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $message) // Using Route Model Binding
    {
        $message->delete(); // Delete the contact message

        Session::flash('success', 'Message deleted successfully!');
        return redirect()->route('admin.messages.index');
    }

    // Since this is just an inbox, we typically don't need create/store/edit/update methods here.
    // So, you can leave them empty or remove them if you explicitly define routes.
    public function create() {}
    public function store(Request $request) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
}