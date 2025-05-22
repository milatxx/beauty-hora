<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqSuggestion;
use App\Models\Faq;


class FaqSuggestionController extends Controller
{
    public function create()
    {
        return view('faq.suggest');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|min:5|max:1000',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        FaqSuggestion::create($validated);

        return redirect()->route('faq.suggest')->with('success', 'Bedankt voor je vraag! We bekijken het zo snel mogelijk.');
    }

    public function index()
{
    $suggestions = FaqSuggestion::latest()->get();
    return view('admin.faq-suggestions.index', compact('suggestions'));
}

public function approve($id)
{
    $suggestion = FaqSuggestion::findOrFail($id);

    // zet suggestie om naar echte FAQ indien gewenst
    Faq::create([
        'question' => $suggestion->question,
        'answer' => 'Beantwoord dit als admin...',
        'faq_category_id' => 1,
    ]);

    $suggestion->delete();

    return back()->with('success', 'Suggestie omgezet naar FAQ.');
}

public function destroy($id)
{
    FaqSuggestion::findOrFail($id)->delete();
    return back()->with('success', 'Suggestie verwijderd.');
}

}