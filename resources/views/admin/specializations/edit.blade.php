<x-app-layout>
    <div class="max-w-xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold mb-6">✏️ Specialisatie bewerken</h2>

        <form action="{{ route('admin.specializations.update', $specialization) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1 font-semibold">Naam</label>
                <input type="text" name="name" value="{{ old('name', $specialization->name) }}" required
                    class="w-full border border-gray-300 rounded px-4 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Bijwerken
            </button>
        </form>
    </div>
</x-app-layout>
