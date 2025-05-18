{{-- resources/views/profiles/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        {{ __('Profiel bewerken') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Name & Email (standaard Breeze) -->
                    <div>
                        <x-input-label for="name" :value="__('Naam')" />
                        <x-text-input id="name" name="name" type="text"
                                      class="block mt-1 w-full"
                                      :value="old('name', $user->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email"
                                      class="block mt-1 w-full"
                                      :value="old('email', $user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Extra velden -->
                    <div class="mt-4">
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" name="username" type="text"
                                      class="block mt-1 w-full"
                                      :value="old('username', $user->username)" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="birthday" :value="__('Geboortedatum')" />
                        <x-text-input id="birthday" name="birthday" type="date"
                                      class="block mt-1 w-full"
                                      :value="old('birthday', optional($user->birthday)->format('Y-m-d'))" />
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('Over mij')" />
                        <textarea id="about" name="about"
                                  class="block mt-1 w-full border-gray-300 rounded-md"
                                  rows="4">{{ old('about', $user->about) }}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="profile_photo" :value="__('Profielfoto (optioneel)')" />
                        <x-text-input id="profile_photo" name="profile_photo" type="file"
                                      class="block mt-1 w-full" />
                        <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-primary-button>
                            {{ __('Opslaan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
