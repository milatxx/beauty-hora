<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('success', 'Gebruikersrol aangepast.');
    }

    public function edit(User $user)
    {
        $specializations = Specialization::all();
        return view('admin.users.edit', compact('user', 'specializations'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'specializations' => ['nullable', 'array'],
            'specializations.*' => ['exists:specializations,id'],
        ]);

        // Specialisaties koppelen
        $user->specializations()->sync($data['specializations'] ?? []);

        // Eventueel ook naam updaten
        if (isset($data['name'])) {
            $user->name = $data['name'];
            $user->save();
        }

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt.');
    }
}
