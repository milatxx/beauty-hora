<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">📨 Contacteer ons</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">
                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                    @csrf

                    <!-- Naam -->
                    <div>
                        <label for="name" class="block font-semibold text-gray-700 mb-1">Naam</label>
                        <input type="text" id="name" name="name" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Onderwerp -->
                    <div>
                        <label for="subject" class="block font-semibold text-gray-700 mb-1">Onderwerp</label>
                        <input type="text" id="subject" name="subject" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Bericht -->
                    <div>
                        <label for="message" class="block font-semibold text-gray-700 mb-1">Bericht</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Typ hier je bericht..."></textarea>
                    </div>

                    <!-- Versturen -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-black font-semibold py-3 rounded-md hover:bg-blue-700 transition">
                            📤 Verstuur Bericht
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-adminlayout>
