<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            👥 Gebruikersbeheer
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto px-6 py-10">
        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden bg-white shadow rounded-xl">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Naam</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Rol</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if ($user->is_admin)
                                    <span class="text-green-600 font-semibold">Admin</span>
                                @else
                                    <span class="text-gray-500">Gebruiker</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                            <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                                <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="text-white bg-indigo-600 hover:bg-indigo-700 font-medium py-1 px-3 rounded text-sm">
                                        @if($user->is_admin)
                                            ❌ Verwijder Admin
                                        @else
                                            ✅ Maak Admin
                                        @endif
                                    </button>
                                </form>
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="text-sm bg-gray-200 text-gray-800 hover:bg-gray-300 font-medium py-1 px-3 rounded">
                                    ✏️ Bewerken
                                </a>

                                <a href="{{ route('profiles.show', $user) }}"
                                   class="text-sm bg-blue-100 text-blue-800 hover:bg-blue-200 font-medium py-1 px-3 rounded">
                                    🔍 Profiel
                                </a>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
