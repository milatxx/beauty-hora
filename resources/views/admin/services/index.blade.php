<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold mb-4">Diensten</h1>
    </x-slot>

    <a href="{{ route('admin.services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        ➕ Nieuwe dienst
    </a>

    @foreach ($services as $service)
        <div class="border p-4 mb-2">
            <div class="font-semibold">{{ $service->name }}</div>
            <div class="text-sm text-gray-600">Duur: {{ $service->duration }} minuten – €{{ number_format($service->price, 2, ',', '.') }}</div>

            <div class="mt-2">{{ $service->description }}</div>

            <div class="mt-2 space-x-2">
                <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600">Bewerken</a>
                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Verwijderen?')" class="text-red-600">Verwijderen</button>
                </form>
            </div>
        </div>
    @endforeach
</x-admin-layout>
