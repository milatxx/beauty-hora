<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">{{ $news->title }}</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto space-y-6">
        @if($news->image)
            <img src="{{ asset('storage/' . $news->image) }}"
                 alt=""
                 class="w-full rounded shadow">
        @endif

        <p class="text-gray-500">
            Gepubliceerd op {{ $news->published_at->format('d-m-Y') }}
        </p>

        <div class="prose">
            {!! nl2br(e($news->content)) !!}
        </div>
    </div>
</x-app-layout>
