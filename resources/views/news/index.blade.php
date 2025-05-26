<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-900 flex items-center gap-2">
                📰 Nieuws
            </h2>

            @auth
                @if(Auth::user()->is_admin)
                    <a href="{{ route('news.create') }}"
                        class="inline-flex items-center bg-blue-600 text-black font-semibold px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        ➕ Nieuw item
                    </a>
                @endif
            @endauth

        </div>

        @if($news->isEmpty())
            <p class="text-gray-500 text-center mt-12">Er zijn nog geen nieuwsitems toegevoegd.</p>
        @else
            <div class="flex flex-col gap-4">
                @foreach($news as $item)
                    <a href="{{ route('news.show', $item->id) }}" class="block">
                    <div class="flex flex-col sm:flex-row bg-white border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
                    <div class="flex-1">
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $item->title }}</h3>        
                            <p class="text-sm text-gray-700 mb-3 line-clamp-2">
                                {{ $item->body }}
                            </p>
                            <div class="text-xs text-gray-500">
                                🗓️ Gepubliceerd op {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </a>

                @endforeach
            </div>

            <!-- Paginatie -->
            <div class="mt-8">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
