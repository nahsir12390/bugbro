<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    // Example: Send email or save to DB
     Mail::to('nasiruzakari51@gmail.com')->send(new ContactFormMail($validated));

    return back()->with('success', 'Thank you for your message! I will get back to you soon.');
}

}
