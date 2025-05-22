<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 flex items-center gap-2">
            💬 Stel een vraag
        </h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('faq.suggest.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="question" class="block font-semibold text-gray-700 mb-1">Je vraag</label>
                <textarea name="question" id="question" rows="4" required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-sm focus:ring focus:ring-blue-200"></textarea>
            </div>

            <div>
                <label for="name" class="block font-semibold text-gray-700 mb-1">Naam (optioneel)</label>
                <input type="text" name="name" id="name"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="email" class="block font-semibold text-gray-700 mb-1">E-mailadres (optioneel)</label>
                <input type="email" name="email" id="email"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 shadow-sm focus:ring focus:ring-blue-200">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-2 rounded-xl transition shadow">
                    Verzenden
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
