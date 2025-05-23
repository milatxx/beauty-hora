<x-app-layout>
    <h2 class="text-2xl font-bold text-gray-900">💆‍♀️ Beschikbare Diensten</h2>

    <div class="py-8">
        <div class="mx-auto flex flex-grow px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col flex-grow  space-y-4">
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
</x-app-layout>
