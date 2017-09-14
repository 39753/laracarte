<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageCreated;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function create()
    {
        return view('contacts/create');
    }

    public function store(ContactRequest $request)
    {
        $message = Message::create($request->only('name', 'email', 'message'));

        Mail::to(config('laracarte.admin_support_email'))
            ->send(new ContactMessageCreated($message));

        flashy('Nous vous répondrons dans les plus bref délais');

        return redirect()->route('root_path');
    }
}
