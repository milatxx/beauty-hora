<x-guest-layout>
    

        <div class="bg-white bg-opacity-80 backdrop-blur-md p-10 rounded-2xl shadow-none w-full max-w-md text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welkom bij Beauty Hóra</h1>
            <p class="text-sm text-gray-600 mb-8">Health & Skin Clinic</p>

            <div class="flex flex-col gap-4">
                <a href="{{ route('login') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                    Log in
                </a>
                <a href="{{ route('register') }}"
                   class="bg-white hover:bg-gray-100 text-blue-700 font-semibold py-3 border border-blue-600 rounded-lg transition">
                    Registreer
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
