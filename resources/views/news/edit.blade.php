<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Bewerken: ') }}{{ $news->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Titel --}}
                <div class="mb-4">
                    <label for="title" class="block font-medium">Titel</label>
                    <input type="text" name="title" id="title"
                           class="mt-1 block w-full border-gray-300 rounded"
                           value="{{ old('title', $news->title) }}">
                    @error('title')<p class="text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Inhoud --}}
                <div class="mb-4">
                    <label for="content" class="block font-medium">Inhoud</label>
                    <textarea name="content" id="content" rows="6"
                              class="mt-1 block w-full border-gray-300 rounded">{{ old('content', $news->content) }}</textarea>
                    @error('content')<p class="text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Afbeelding --}}
                <div class="mb-4">
                    <label for="image" class="block font-medium">Afbeelding (optioneel)</label>
                    <input type="file" name="image" id="image" class="mt-1">
                    @error('image')<p class="text-red-600">{{ $message }}</p>@enderror
                </div>

                {{-- Publicatiedatum --}}
                <div class="mb-6">
                    <label for="published_at" class="block font-medium">Publicatiedatum</label>
                    <input type="date" name="published_at" id="published_at"
                           class="mt-1 block border-gray-300 rounded"
                           value="{{ old('published_at', $news->published_at->toDateString()) }}">
                    @error('published_at')<p class="text-red-600">{{ $message }}</p>@enderror
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Bijwerken
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
