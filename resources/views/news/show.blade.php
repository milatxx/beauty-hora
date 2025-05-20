<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

        <p class="mb-4">{{ $news->content }}</p>

        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="afbeelding" class="mb-4 rounded shadow" style="max-width: 400px;">
        @endif

        <p class="text-gray-500 mb-6">Geplaatst op: {{ $news->published_at }}</p>

        @can('update', $news)
            <a href="{{ route('news.edit', $news) }}" class="text-blue-600 hover:underline">✏️ Bewerken</a>
        @endcan

        <hr class="my-8">

        {{-- 🗨️ Comment Form --}}
        <h2 class="text-2xl font-semibold mb-4">Reageer</h2>

        @auth
            <form method="POST" action="{{ route('comments.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="news_id" value="{{ $news->id }}">

                <div>
                    <label for="body" class="block font-medium">Jouw reactie:</label>
                    <textarea name="body" id="body" rows="4" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>

                    @error('body')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Plaatsen
                </button>
            </form>
        @else
            <p class="text-gray-600">🔒 <a href="{{ route('login') }}" class="underline text-blue-600">Log in</a> om te reageren.</p>
        @endauth

        {{-- 💬 Comment List --}}
        <div class="mt-10">
            <h3 class="text-xl font-semibold mb-4">Reacties ({{ $news->comments->count() }})</h3>

            @forelse ($news->comments as $comment)
                <div class="mb-4 border rounded p-4 bg-gray-50">
                    <p class="font-medium">{{ $comment->user->name }}</p>
                    <p class="text-gray-800 mt-1">{{ $comment->body }}</p>
                    <p class="text-sm text-gray-500 mt-2">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-gray-500">Er zijn nog geen reacties.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
