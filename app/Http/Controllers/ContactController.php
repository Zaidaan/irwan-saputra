<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage; // Import your ContactMessage model
use Illuminate\Support\Facades\Session; // For flash messages

class ContactController extends Controller
{
    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|email|max:255',
            'request_type' => 'required|string|in:Hourly,Project,Period contract,Just want to say hi', // Validate against allowed options
            'description' => 'nullable|string',
        ]);

        // 2. Create a new ContactMessage record in the database
        ContactMessage::create($validatedData);

        // 3. Flash a success message to the session
        Session::flash('success_contact', 'Your message has been sent successfully!');
        // Or you can flash an 'error_contact' if something goes wrong (e.g., in a try-catch block)

        // 4. Redirect back to the homepage (or wherever the form was submitted from)
        return redirect()->back(); // Redirect back to the previous page
    }
}