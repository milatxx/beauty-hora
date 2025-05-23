<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Profiel bewerken
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                @if (session('status') === 'profile-updated')
                    <div class="mb-4 text-green-600">
                        Profiel succesvol bijgewerkt.
                    </div>
                @endif

                @if ($errors->any())
                    <ul class="mb-4 text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Naam</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Gebruikersnaam</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Over jezelf</label>
                        <textarea name="about_me" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('about_me', $user->about_me) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Geboortedatum</label>
                        <input type="date" name="birthday" value="{{ old('birthday', optional($user->birthday)->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    @if ($user->profile_photo)
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Huidige profielfoto</label>
                            <img src="{{ asset('storage/' . $user->profile_photo) }}" class="mt-2 w-32 h-32 object-cover rounded-full">
                        </div>
                    @endif

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700">Nieuwe profielfoto</label>
                        <input type="file" name="profile_photo" class="mt-1 block w-full">
                    </div>

                    <div>
                        <x-primary-button>Opslaan</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
