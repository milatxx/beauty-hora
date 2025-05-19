<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Stuur mail naar alle admins
        $admins = \App\Models\User::where('is_admin', true)->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new ContactMessageMail($data));
        }

        return redirect()->route('contact.create')->with('success', 'Je bericht is verzonden!');
    }
}
