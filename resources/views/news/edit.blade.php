<x-app-layout>
    <h1>Nieuws bewerken</h1>

    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Titel:</label>
        <input type="text" name="title" value="{{ old('title', $news->title) }}" required>

        <label for="content">Inhoud:</label>
        <textarea name="content" required>{{ old('content', $news->content) }}</textarea>

        <label for="published_at">Publicatiedatum:</label>
        <input type="date" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}">

        @if($news->image)
            <p>Huidige afbeelding:</p>
            <img src="{{ asset('storage/' . $news->image) }}" alt="huidige afbeelding" style="max-width: 200px;">
        @endif

        <label for="image">Nieuwe afbeelding (optioneel):</label>
        <input type="file" name="image">

        <button type="submit">Bijwerken</button>
    </form>
</x-app-layout>
