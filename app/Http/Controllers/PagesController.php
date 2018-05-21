<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class PagesController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function postContact(Request $request) {

		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);
		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('lteto5g@gmail.com');
			$message->subject($data['subject']);
		});
		Session::flash('success', 'Your Email was Sent!');
		return redirect('/contact/help-desk');
	}

}
