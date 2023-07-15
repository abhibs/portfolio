<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $datas = Enquiry::latest()->get();
        return view('admin.enquiry.index', compact('datas'));
    }

    public function delete($id)
    {
        Enquiry::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Enquiry Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }
}
