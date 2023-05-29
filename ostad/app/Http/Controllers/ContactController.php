<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         // Get the form input data
         $name = $request->input('name');
         $email = $request->input('email');
         $message = $request->input('message');
 
         // Send email
         $to = 'towhidhasan552@gmail.com'; 
         $subject = 'Contact Form Submission';
         $content = "Name: $name\nEmail: $email\nMessage: $message";
         Mail::raw($content, function ($message) use ($to, $subject) {
             $message->to($to)->subject($subject);
         });
 
         
         return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
