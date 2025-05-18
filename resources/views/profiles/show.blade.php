<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Profiel:') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-4">
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
                <div class="prose">
                    {!! nl2br(e($user->about_me)) !!}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
