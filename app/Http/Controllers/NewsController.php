<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::orderBy('published_at', 'desc')->paginate(10);
        return view('news.index', compact('allNews'));
    }

    public function create()
    {
        $this->authorize('create', News::class);
        return view('news.create');
    }

    public function store(StoreNewsRequest $request)
    {
        $this->authorize('create', News::class);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['user_id'] = auth()->id();

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem toegevoegd');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);
        return view('news.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $this->authorize('update', $news);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($news->image);
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('news.show', $news)->with('success', 'Nieuwsitem bijgewerkt');
    }

    public function destroy(News $news)
    {
        $this->authorize('delete', $news);
        Storage::disk('public')->delete($news->image);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd');
    }
}
