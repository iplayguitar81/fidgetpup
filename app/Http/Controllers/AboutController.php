<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

use App\Http\Requests;
use Validator;

class AboutController extends Controller
{
    public function create()
    {
        return view('about.contact');
    }

    public function about()
    {
        return view('about');
    }


    public function disclaimer()
    {
        return view('disclaimer');
    }


    public function store(ContactFormRequest $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);


        \Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('info@fidgetspinnerdog.com');
                $message->to('snyder.chris.m@gmail.com', 'FidgetSpinnerDog.com')->subject('fidgetspinnerdog.com Contact Email!');
            });




        return \Redirect::to('/')
            ->with('message', 'Thanks for contacting us!');

    }
}
