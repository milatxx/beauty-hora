<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">📋 Alle Boekingen (Admin)</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-200">
                <table class="w-full table-auto">
                    <thead class="bg-gray-100 text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 text-center">👤 Gebruiker</th>
                            <th class="px-6 py-4 text-center">💅 Dienst</th>
                            <th class="px-6 py-4 text-center">📆 Datum</th>
                            <th class="px-6 py-4 text-center">⏰ Tijd</th>
                            <th class="px-6 py-4 text-center">📝 Opmerkingen</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-center font-medium">{{ $booking->user->name }}</td>
                                <td class="px-6 py-4 text-center">{{ $booking->service->name }}</td>
                                <td class="px-6 py-4 text-center">{{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-center">{{ $booking->time }}</td>
                                <td class="px-6 py-4 text-center">{{ $booking->notes ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center px-6 py-6 text-gray-500">Geen boekingen gevonden.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
