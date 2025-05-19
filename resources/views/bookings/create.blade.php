<x-adminlayout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">🗓️ Nieuwe Boeking</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                <form method="POST" action="/bookings" class="space-y-6">
                    @csrf

                    <!-- Dienst -->
                    <div>
                        <label for="service_id" class="block font-semibold text-gray-700 mb-1">Dienst:</label>
                        <select name="service_id" id="service_id" required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->name }} (€{{ number_format($service->price, 2) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Datum -->
                    <div>
                        <label for="date" class="block font-semibold text-gray-700 mb-1">Datum:</label>
                        <input type="date" name="date" id="date" required
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Tijd -->
                    <div>
                        <label for="time" class="block font-semibold text-gray-700 mb-1">Tijd:</label>
                        <input type="time" name="time" id="time" required
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Opmerkingen -->
                    <div>
                        <label for="notes" class="block font-semibold text-gray-700 mb-1">Opmerkingen:</label>
                        <textarea name="notes" id="notes" rows="3"
                                  class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Eventuele extra info..."></textarea>
                    </div>

                    <!-- Knop -->
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-blue-600 text-black font-semibold py-3 rounded-md hover:bg-blue-700 transition">
                            ✅ Bevestig Boeking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-adminlayout>
