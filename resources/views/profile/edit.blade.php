<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ __('Profiel bewerken') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow space-y-6">

            {{-- Profielinformatie updaten --}}
            <div>
                <form method="POST"
                      action="{{ route('profile.update') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Profielfoto --}}
                    <div class="mb-4">
                        <label for="profile_photo" class="block font-medium">
                            Profielfoto
                        </label>
                        <input type="file"
                               name="profile_photo"
                               id="profile_photo"
                               class="mt-1 block w-full">
                        @error('profile_photo')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gebruikersnaam --}}
                    <div class="mb-4">
                        <label for="username" class="block font-medium">
                            Gebruikersnaam
                        </label>
                        <input type="text"
                               name="username"
                               id="username"
                               class="mt-1 block w-full border-gray-300 rounded"
                               value="{{ old('username', $user->username) }}">
                        @error('username')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Geboortedatum --}}
                    <div class="mb-4">
                        <label for="birthday" class="block font-medium">
                            Geboortedatum
                        </label>
                        <input type="date"
                               name="birthday"
                               id="birthday"
                               class="mt-1 block border-gray-300 rounded"
                               value="{{ old('birthday', optional($user->birthday)->toDateString()) }}">
                        @error('birthday')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Over mij --}}
                    <div class="mb-6">
                        <label for="about_me" class="block font-medium">
                            Over mij
                        </label>
                        <textarea name="about_me"
                                  id="about_me"
                                  rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded">{{ old('about_me', $user->about_me) }}</textarea>
                        @error('about_me')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Opslaan
                    </button>
                </form>
            </div>

        
        </div>
    </div>
</x-app-layout>
