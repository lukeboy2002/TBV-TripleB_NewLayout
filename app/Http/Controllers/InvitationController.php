<?php

namespace App\Http\Controllers;

use App\Mail\UserInvitation;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class InvitationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    $existsInInvitations = DB::table('invitations')->where('email', $value)->exists();
                    $existsInUsers = DB::table('users')->where('email', $value)->exists();

                    if ($existsInInvitations || $existsInUsers) {
                        $fail('The email has already been taken.');
                    }
                },
            ],
        ]);

        $invitation = Invitation::create([
            'email' => $request['email'],
            'invited_by' => auth()->user()->username,
            'invited_date' => now(),
        ]);

        $invitation->generateInvitationToken();
        $invitation->save();

        $mailData = [
            'title' => 'U have a invitation from TripleB',
            'link' => $invitation->getLink(),
            'invited_by' => auth()->user()->username,
            'invited_date' => now(),
        ];

        Mail::to($request->get('email'))->send(new UserInvitation($mailData));

        toastr()->success('Invitation to register successfully requested. A mail is been send to '.$invitation->email);

        return Redirect::route('invitation.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('create:invitee')) {
            return view('invitations.create');
        } else {
            abort(403);
        }
    }
}
