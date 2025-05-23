<x-admin-layout>
    <h1 class="text-xl font-bold mb-4">
        {{ isset($service) ? 'Dienst bewerken' : 'Nieuwe dienst' }}
    </h1>

    <form method="POST" action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}">
        @csrf
        @if(isset($service)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block mb-2">Naam</label>
            <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" required class="border p-2 rounded w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Beschrijving</label>
            <textarea name="description" class="border p-2 rounded w-full">{{ old('description', $service->description ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Prijs (€)</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $service->price ?? '') }}" required class="border p-2 rounded w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Duur (minuten)</label>
            <input type="number" name="duration" value="{{ old('duration', $service->duration ?? '') }}" required class="border p-2 rounded w-full">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            {{ isset($service) ? 'Bijwerken' : 'Aanmaken' }}
        </button>
    </form>
</x-admin-layout>
