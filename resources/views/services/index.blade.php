<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">💆‍♀️ Beschikbare Diensten</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 hover:shadow-md transition">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $service->name }}</h3>
                        <p class="text-sm text-blue-600 font-semibold mb-2">€{{ number_format($service->price, 2) }} • {{ $service->duration }} min</p>
                        <p class="text-gray-600 text-sm">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin-layout>
