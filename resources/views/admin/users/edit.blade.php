<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            ✏️ Gebruiker bewerken: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6 space-y-6">
            @if(session('success'))
                <div class="text-green-600 font-semibold">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Naam -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Naam
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>


                <!-- Specialisaties -->
                <div>
                    <label for="specializations" class="block text-sm font-medium text-gray-700 mb-1">
                        Specialisaties
                    </label>
                    <select multiple name="specializations[]" id="specializations"
                        class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach($specializations as $specialization)
                            <option value="{{ $specialization->id }}"
                                {{ $user->specializations->contains($specialization->id) ? 'selected' : '' }}>
                                {{ $specialization->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Gebruik Ctrl (of Cmd) om meerdere te selecteren</p>
                </div>

                <!-- Submit knop -->
                <div class="pt-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow">
                        💾 Opslaan
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="ms-4 text-sm text-gray-600 hover:underline">
                        Annuleren
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
