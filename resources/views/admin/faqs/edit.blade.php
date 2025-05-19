<x-app-layout>
    <h1 class="text-xl font-bold mb-4">
        {{ isset($faq) ? 'Vraag bewerken' : 'Nieuwe vraag' }}
    </h1>

    <form method="POST" action="{{ isset($faq) ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}">
        @csrf
        @if(isset($faq)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block mb-2">Categorie</label>
            <select name="faq_category_id" required class="border p-2 rounded w-full">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('faq_category_id', $faq->faq_category_id ?? '') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-2">Vraag</label>
            <input type="text" name="question" value="{{ old('question', $faq->question ?? '') }}" required class="border p-2 rounded w-full">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Antwoord</label>
            <textarea name="answer" class="border p-2 rounded w-full" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            {{ isset($faq) ? 'Bijwerken' : 'Aanmaken' }}
        </button>
    </form>
</x-app-layout>
