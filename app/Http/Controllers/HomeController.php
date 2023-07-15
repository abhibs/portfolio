<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\NameContent;
use App\Models\Slider;
use App\Models\Skill;
use App\Models\AboutVideo;
use App\Models\Resume;
use App\Models\Program;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Experiance;
use App\Models\Enquiry;

use Mail;

class HomeController extends Controller
{
    public function index(){
        $socialmedia = SocialMedia::find(1);
        $namecontent = NameContent::find(1);
        $sliders = Slider::where('status',1)->get();
        $skills = Skill::where('status',1)->get();
        $aboutvideo = AboutVideo::find(1);
        $resume = Resume::find(1);
        $program = Program::find(1);
        $projects = Project::where('status',1)->get();
        $experiances = Experiance::where('status',1)->get();


        return view('welcome',compact('socialmedia', 'namecontent', 'sliders', 'skills', 'aboutvideo', 'resume', 'program', 'projects', 'experiances'));
    }


    public function contactPost(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
        ]);

        $contact = new Contact;
        $contact->email = $request->email;
        $contact->save();

        $notification = array(
            'message' => 'Contact Submitted successfully',
            'alert-type' => 'success'
        );

        Mail::send('mail.contact', [
            'email' => $request->email,
        ], function ($message) use ($request) {
            $message->from($request->email);
            $message->subject('Contact Us');
            $message->to('abhirambs97@gmail.com');
        });

        return redirect()->back()->with($notification);

    }

    public function enquiryPost(Request $request)
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

        $notification = array(
            'message' => 'Enquiry Submitted successfully',
            'alert-type' => 'success'
        );

        Mail::send('mail.enquiry', [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ], function ($message) use ($request) {
            $message->from($request->email);
            $message->subject('Enquiry Form');
            $message->to('abhirambs97@gmail.com');
        });

        return redirect()->back()->with($notification);

    }
}
