<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Mail\ContactFormReply;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'min:4', 'max:100'],
            'body' => ['required', 'string', 'min:10', 'max:3500'],
        ]);

        Contact::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'body' => $request['body'],
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
        ]);

        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
            'ipaddress' => request()->getClientIp(),
            'time' => now(),
        ];

        Mail::to('info@tbv-tripleb.nl')->send(new ContactForm($mailData));
        Mail::to($request->get('email'))->send(new ContactFormReply($mailData));

        return redirect()->route('contact.create')->banner('success Your message has been sent.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
