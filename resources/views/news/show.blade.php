<x-app-layout>
    <h1>{{ $news->title }}</h1>

    <p>{{ $news->content }}</p>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="afbeelding" style="max-width: 300px;">
    @endif

    <p>Geplaatst op: {{ $news->published_at }}</p>

    @can('update', $news)
        <a href="{{ route('news.edit', $news) }}">✏️ Bewerken</a>
    @endcan
</x-app-layout>
