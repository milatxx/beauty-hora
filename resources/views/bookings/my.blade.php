<x-app-layout>
    <div class="max-w-4xl mx-auto py-10">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">📅 Mijn Boekingen</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse($bookings as $booking)
        <div class="bg-white border border-gray-200 rounded-xl px-6 py-5 mb-6 shadow-sm">

                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $booking->service->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">🗓️ {{ $booking->date }} om {{ $booking->time }}</p>
                        <p class="text-gray-500 text-sm mt-1">{{ $booking->notes ?? 'Geen opmerkingen' }}</p>
                        <p class="text-sm mt-2">
                            <span class="font-semibold">Status:</span>
                            @if($booking->status === 'geannuleerd')
                                <span class="text-red-600 font-medium">Geannuleerd</span>
                            @else
                                <span class="text-green-600 font-medium">Bevestigd</span>
                            @endif
                        </p>
                    </div>

                    @if($booking->status !== 'geannuleerd')
                        <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-sm font-medium rounded hover:bg-red-200 transition">
                                ❌ Annuleer
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-600">Je hebt nog geen boekingen geplaatst.</p>
        @endforelse
    </div>
</x-app-layout>
