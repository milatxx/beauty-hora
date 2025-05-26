<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Profiel:') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
        @if ($user->specializations->count())
    <div class="mt-4">
        <h3 class="font-semibold text-gray-700 mb-2">💼 Specialisaties:</h3>
        <ul class="list-disc list-inside text-gray-600">
            @foreach ($user->specializations as $specialization)
                <li>{{ $specialization->name }}</li>
            @endforeach
        </ul>
    </div>
@endif

            @if($user->profile_photo)
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}"
                         alt="Profielfoto"
                         class="h-24 w-24 rounded-full object-cover">
                </div>
            @endif

            <div>
                <p><strong>Gebruikersnaam:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Geboortedatum:</strong>
                
                   {{ optional($user->birthday)->format('d-m-Y') ?? '-' }}
                </p>
            </div>

            @if($user->about_me)
            <p><strong>Over jezelf:</strong></p>
                <div class="prose">
                    {!! nl2br(e($user->about_me)) !!}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
