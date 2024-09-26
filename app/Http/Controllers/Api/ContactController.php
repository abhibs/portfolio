<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'name' => 'required',
        ]);

        $contact = new Contact;
        $contact->email = $request->email;
        $contact->save();
        Mail::send('mail.contact', [
            'email' => $request->email,
        ], function ($message) use ($request) {
            $message->from($request->email);
            $message->subject('Contact Us');
            $message->to('abhirambs97@gmail.com');
        });
        return response([
            'message' => 'Contact',
            'status' => 'success',
            'contact' => $contact,
            'code' => 200
        ], 200);

    }
}
