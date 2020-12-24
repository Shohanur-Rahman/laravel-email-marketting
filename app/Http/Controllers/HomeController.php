<?php

namespace App\Http\Controllers;

use App\Imports\XLEmailImport;
use App\Mail\POGEmailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendEmail(Request $request)
    {
        $file=$request->xl_list;

        $xlImport = Excel::import(new XLEmailImport(), $file);
        $data = array(
            'subject' => $request->subject,
        );

        $xlEmails = Excel::toArray(new XLEmailImport(), $file);
        $emails = array();

        foreach ($xlEmails as $xlEmail){
            foreach ($xlEmail as $item){
                if(filter_var($item[0], FILTER_VALIDATE_EMAIL)){
                    array_push($emails,$item[0]);
                    $mailStatus  = Mail::to($item[0])->send(new POGEmailer($data));
                }
            }
        }
        return redirect()->route('home')->with('message','Your Email Successfully Sent.');
    }

    public function testMail()
    {
        return view('emails.default');
    }
}
