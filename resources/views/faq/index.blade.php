<x-app-layout>
    <h1 class="text-xl font-bold mb-6">Veelgestelde Vragen</h1>

    @foreach ($categories as $category)
        <div class="mb-4">
            <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
            <ul class="mt-2 space-y-2">
                @foreach ($category->faqs as $faq)
                    <li x-data="{ open: false }" class="border p-2 rounded">
                        <button @click="open = !open" class="font-medium text-left w-full">
                            {{ $faq->question }}
                        </button>
                        <div x-show="open" class="mt-2 text-sm text-gray-700">
                            {{ $faq->answer }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</x-app-layout>
