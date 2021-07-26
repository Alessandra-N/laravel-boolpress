<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('guest.welcome', compact('categories'));
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contacts()
    {
        return view('guest.contacts');
    }

    public function sendForm(Request $request)
    {
        $valData = $request->validate(
            [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            ]
        );
        Mail::to('kinire3593@dmsdmg.com')
            ->cc($valData['email'])
            ->send(new ContactFormMailable($valData));
        return redirect()->back()->with('message', 'Message sent successfully');
    }
}
