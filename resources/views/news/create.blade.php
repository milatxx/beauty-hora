<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="bg-white border border-gray-200 shadow-lg rounded-lg p-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-10 flex items-center gap-2">
                🆕 Nieuws toevoegen
            </h2>

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Titel -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-800 mb-2">Titel</label>
                    <input type="text" id="title" name="title" required
                        class="w-full border border-gray-300 rounded-lg px-5 py-3 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Inhoud -->
                <div>
                    <label for="body" class="block text-sm font-semibold text-gray-800 mb-2">Inhoud</label>
                    <textarea id="body" name="body" rows="6" required
                        class="w-full border border-gray-300 rounded-lg px-5 py-3 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Typ hier je nieuwsbericht..."></textarea>
                </div>

                <!-- Publicatiedatum -->
                <div>
                    <label for="published_at" class="block text-sm font-semibold text-gray-800 mb-2">Publicatiedatum</label>
                    <input type="date" id="published_at" name="published_at" required
                        class="w-full border border-gray-300 rounded-lg px-5 py-3 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Afbeelding -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-800 mb-2">Afbeelding (optioneel)</label>
                    <input type="file" id="image" name="image"
                        class="block w-full text-sm text-gray-700
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0
                               file:bg-blue-100 file:text-blue-700
                               hover:file:bg-blue-200 transition">
                </div>

                <!-- Opslaan -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white text-lg font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">
                        💾 Opslaan nieuwsitem
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
