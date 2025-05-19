<x-app-layout>
    <h1 class="text-xl font-bold mb-4">
        {{ isset($faqCategory) ? 'Categorie bewerken' : 'Nieuwe categorie' }}
    </h1>

    <form method="POST" action="{{ isset($faqCategory) ? route('admin.faq-categories.update', $faqCategory) : route('admin.faq-categories.store') }}">
        @csrf
        @if(isset($faqCategory)) @method('PUT') @endif

        <label class="block mb-2">Naam:</label>
        <input type="text" name="name" value="{{ old('name', $faqCategory->name ?? '') }}" required class="border p-2 rounded w-full mb-4">

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            {{ isset($faqCategory) ? 'Bijwerken' : 'Aanmaken' }}
        </button>
    </form>
</x-app-layout>
