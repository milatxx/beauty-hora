<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Nieuws') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-4">
            @forelse($allNews as $news)
                <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <a href="{{ route('news.show', $news) }}"
                           class="text-xl font-bold hover:underline">
                            {{ $news->title }}
                        </a>
                        <p class="text-gray-500 text-sm">
                            Gepubliceerd op {{ $news->published_at->format('d-m-Y') }}
                        </p>
                    </div>
                    @canany(['update','delete'], $news)
                        <div class="space-x-2">
                            <a href="{{ route('news.edit', $news) }}"
                               class="text-blue-600 hover:underline">
                                Bewerk
                            </a>
                            <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Weet je het zeker?')">
                                    Verwijder
                                </button>
                            </form>
                        </div>
                    @endcanany
                </div>
            @empty
                <p>Er zijn (nog) geen nieuwsitems.</p>
            @endforelse

            {{-- Pagina­tratie --}}
            <div class="mt-4">
                {{ $allNews->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
