<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold mb-6">Specialisaties</h2>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.specializations.create') }}" class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            ➕ Nieuwe specialisatie
        </a>

        <ul class="space-y-3">
            @foreach ($specializations as $specialization)
                <li class="bg-white shadow p-4 rounded flex justify-between items-center">
                    <span>{{ $specialization->name }}</span>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.specializations.edit', $specialization) }}" class="text-blue-600 hover:underline">✏️ Bewerken</a>
                        <form action="{{ route('admin.specializations.destroy', $specialization) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">🗑️ Verwijderen</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
