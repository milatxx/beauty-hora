<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">📚 Veelgestelde Vragen</h1>

        @foreach ($categories as $category)
            <div class="mb-10">
                <h2 class="text-xl font-semibold text-blue-700 mb-4">{{ $category->name }}</h2>

                @forelse ($category->faqs as $faq)
                    <div x-data="{ open: false }" class="mb-4 border border-gray-200 rounded-lg bg-white shadow-sm">
                        <button 
                            @click="open = !open" 
                            class="w-full flex justify-between items-center px-5 py-4 text-left font-medium text-gray-900 hover:bg-blue-50 transition rounded-t">
                            <span>{{ $faq->question }}</span>
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M20 12H4"/>
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-5 pb-4 pt-2 text-gray-700 border-t">
                            @if ($faq->answer && $faq->answer !== 'Beantwoord dit als admin...')
                                {{ $faq->answer }}
                            @else
                                <p class="text-sm text-gray-400 italic">Deze vraag is nog niet beantwoord.</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Geen vragen in deze categorie.</p>
                @endforelse
            </div>
        @endforeach
    </div>
</x-app-layout>
