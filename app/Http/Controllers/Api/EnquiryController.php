<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Mail;

class EnquiryController extends Controller
{
    public function enquiry(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->phone = $request->phone;
        $enquiry->email = $request->email;

        $enquiry->save();
        Mail::send('mail.enquiry', [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ], function ($message) use ($request) {
            $message->from($request->email);
            $message->subject('Enquiry Form');
            $message->to('abhirambs97@gmail.com');
        });
        return response([
            'message' => 'Enquiry Form',
            'status' => 'success',
            'enquiry' => $enquiry,
            'code' => 200
        ], 200);

    }
}
