<x-app-layout>
    <div class="max-w-5xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6">FAQ Suggesties</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @forelse($suggestions as $suggestion)
            <div class="mb-6 p-4 border rounded bg-gray-50">
                <p><strong>Vraag:</strong> {{ $suggestion->question }}</p>
                <p class="text-sm text-gray-600 mt-2">Door: {{ $suggestion->name ?? 'Anoniem' }} - {{ $suggestion->email ?? 'Geen e-mail' }}</p>

                <div class="mt-4 flex gap-3">
                    <form method="POST" action="{{ route('faq.suggestions.approve', $suggestion->id) }}">
                        @csrf
                        <button class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">✅ Goedkeuren</button>
                    </form>

                    <form method="POST" action="{{ route('faq.suggestions.destroy', $suggestion->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">🗑️ Verwijderen</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Geen nieuwe suggesties.</p>
        @endforelse
    </div>
</x-app-layout>
