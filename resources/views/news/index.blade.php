<x-app-layout>
    <h1>Nieuws</h1>

    @can('create', App\Models\News::class)
        <a href="{{ route('news.create') }}">➕ Nieuw item</a>
    @endcan

    @foreach ($allNews as $news)
        <div>
            <h2>
                <a href="{{ route('news.show', $news) }}">{{ $news->title }}</a>
            </h2>
            <p>{{ \Str::limit($news->content, 150) }}</p>
        </div>
    @endforeach

    {{ $allNews->links() }}
</x-app-layout>
