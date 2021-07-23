<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('guest.contacts');
    }

    public function send(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "message"=> "required",
        ]);
        $contact = Contact::create($validatedData);
        Mail::to('admin@test.com')->send(new ContactFormMail($contact));
        return redirect()->back()->with('message', "Successo! Grazier per l'email!");
    }

    /* public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message'=> 'required'
        ]);
 
        $mail = Contact::create($data);
        $to = 'admin@example.com';
        Mail::to($to)->send(new ContactFormMail($mail));

        return redirect()->route('contacts')->with('message', 'Thanks for your message we will reply asap');
    } */
}
