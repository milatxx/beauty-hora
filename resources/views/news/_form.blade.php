@php
  // Optioneel: alle validation errors ophalen
  $errorsAll = $errors->getMessages();
@endphp

<div class="space-y-4">
  {{-- Titel --}}
  <div>
    <label for="title" class="block text-sm font-medium mb-1">Titel</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $news->title) }}"
           class="w-full border-gray-300 rounded p-2 @error('title') border-red-500 @enderror"
           required>
    @error('title')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  {{-- Inhoud --}}
  <div>
    <label for="content" class="block text-sm font-medium mb-1">Inhoud</label>
    <textarea name="content" id="content" rows="6"
              class="w-full border-gray-300 rounded p-2 @error('content') border-red-500 @enderror"
              required>{{ old('content', $news->content) }}</textarea>
    @error('content')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  {{-- Afbeelding --}}
  <div>
    <label for="image" class="block text-sm font-medium mb-1">Afbeelding (optioneel)</label>
    <input type="file" name="image" id="image"
           class="@error('image') border-red-500 @enderror">
    @error('image')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  {{-- Publicatiedatum --}}
  <div>
    <label for="published_at" class="block text-sm font-medium mb-1">Publicatiedatum</label>
    <input type="date" name="published_at" id="published_at"
           value="{{ old('published_at', $news->published_at?->format('Y-m-d')) }}"
           class="border-gray-300 rounded p-2 @error('published_at') border-red-500 @enderror"
           required>
    @error('published_at')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  {{-- Submit-knop --}}
  <div>
    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-black mb-1 rounded">
      {{ $submitButtonText }}
    </button>
  </div>
</div>
