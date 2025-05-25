<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::all();
        return view('admin.specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Specialization::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.specializations.index')->with('success', 'Specialisatie toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        return view('admin.specializations.edit', compact('specialization'));
    }

    public function update(Request $request, Specialization $specialization)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $specialization->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.specializations.index')->with('success', 'Specialisatie bijgewerkt.');
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return redirect()->route('admin.specializations.index')->with('success', 'Specialisatie verwijderd.');
    }
}
