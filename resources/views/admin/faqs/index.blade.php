<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold mb-4">FAQ Vragen</h1>
     </x-slot>

    <a href="{{ route('admin.faqs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        ➕ Nieuwe vraag
    </a>

    @foreach ($faqs as $faq)
        <div class="border p-4 mb-2">
            <div class="font-semibold">{{ $faq->question }}</div>
            <div class="text-sm text-gray-600">Categorie: {{ $faq->category->name }}</div>

            <div class="mt-2">{{ $faq->answer }}</div>

            <div class="mt-2 space-x-2">
                <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-blue-600">Bewerken</a>
                <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Verwijderen?')" class="text-red-600">Verwijderen</button>
                </form>
            </div>
        </div>
    @endforeach
</x-admin-layout>
