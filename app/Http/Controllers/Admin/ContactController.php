<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        $datas = Contact::latest()->get();
        return view('admin.contact.index', compact('datas'));
    }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Contact Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }
}
