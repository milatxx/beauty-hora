<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Contacteer ons</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">Naam</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label for="subject" class="block font-semibold mb-1">Onderwerp</label>
                <input type="text" name="subject" id="subject" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-6">
                <label for="message" class="block font-semibold mb-1">Bericht</label>
                <textarea name="message" id="message" rows="5" class="w-full border border-gray-300 rounded px-3 py-2" required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-black font-semibold px-6 py-2 rounded hover:bg-blue-700 transition">
                Verzenden
            </button>
        </form>
    </div>
</x-app-layout>
