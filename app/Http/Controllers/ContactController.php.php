<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);


        Mail::to(request('email'))
            ->send(new ContactMe('shirts'));
        //good but does not have styling
        // Mail::raw('It works', function ($message) {
        //     $message->to(request('email'))->subject('Hello There');
        // });

        return redirect('/contact')
            ->with('message', 'Email sent!');
    }
}
