<x-admin-layout>

    <x-slot name="header">
            <h1 class="text-xl font-bold mb-4">FAQ Categorieën</h1>
    </x-slot>

    <a href="{{ route('admin.faq-categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        ➕ Nieuwe categorie
    </a>

    @foreach ($categories as $category)
        <div class="border p-4 mb-2 flex justify-between items-center">
            <span>{{ $category->name }}</span>
            <div class="space-x-2">
                <a href="{{ route('admin.faq-categories.edit', $category) }}" class="text-blue-600">Bewerken</a>
                <form action="{{ route('admin.faq-categories.destroy', $category) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Verwijderen?')" class="text-red-600">Verwijderen</button>
                </form>
            </div>
        </div>
    @endforeach
</x-admin-layout>
