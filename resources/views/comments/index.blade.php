<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold mb-6">🛠️ Comment Moderatie</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @forelse($comments as $comment)
            <div class="bg-white p-4 shadow rounded mb-4">
                <p class="text-gray-800 mb-2">{{ $comment->content }}</p>
                <p class="text-sm text-gray-500">Door: {{ $comment->user->name }} op {{ $comment->created_at->format('d/m/Y H:i') }}</p>

                <div class="mt-3 flex gap-2">
                    @if(!$comment->approved)
                        <form method="POST" action="{{ route('comments.approve', $comment) }}">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">✅ Goedkeuren</button>
                        </form>
                    @endif
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">🗑️ Verwijder</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Geen reacties gevonden.</p>
        @endforelse

        {{ $comments->links() }}
    </div>
</x-app-layout>
