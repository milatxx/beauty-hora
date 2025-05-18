<x-app-layout>
    <h1>Nieuws toevoegen</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Titel:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>

        <label for="content">Inhoud:</label>
        <textarea name="content" required>{{ old('content') }}</textarea>

        <label for="published_at">Publicatiedatum:</label>
        <input type="date" name="published_at" value="{{ old('published_at') }}">

        <label for="image">Afbeelding (optioneel):</label>
        <input type="file" name="image">

        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
