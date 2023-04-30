<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Auth;
use DateTime;
class ComplaintController extends Controller
{
    public function dashboard(){
        $complain = Complaint::where('customer_id',Auth::guard('web')->user()->id)->get();
        //dd($complain);
        return view('admin.customer.dashboard',compact('complain'));
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }
    public function customerCreate(Request $request){
        $complain = new Complaint();
        $complain->customer_id = Auth::guard('web')->user()->id;
        $complain->complaint_description = $request->complaint_description;
        $complain->complaint_date = new DateTime('now');
        $complain->save();
    }
}
