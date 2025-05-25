<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto text-gray-800" />
                    </a>
                </div>

                <!-- Nav links (desktop) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- Publiek --}}
                    <x-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')">
                        <i data-lucide="newspaper" class="w-4 h-4 inline me-1"></i>Nieuws
                    </x-nav-link>

                    <x-nav-link href="/services" :active="request()->is('services')">
                        <i data-lucide="scissors" class="w-4 h-4 inline me-1"></i>Diensten
                    </x-nav-link>

                    <x-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')">
                        <i data-lucide="help-circle" class="w-4 h-4 inline me-1"></i>FAQ
                    </x-nav-link>

                    <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.*')">
                        <i data-lucide="mail" class="w-4 h-4 inline me-1"></i>Contact
                    </x-nav-link>

                    @auth
                        <x-nav-link href="/bookings/create" :active="request()->is('bookings/create')">
                            <i data-lucide="calendar-plus" class="w-4 h-4 inline me-1"></i>Boek nu
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Rechterkant -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    @if(Auth::user()->is_admin)
                        <!-- Admin dropdown -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700">
                                    <i data-lucide="shield-check" class="w-4 h-4 me-1"></i>Beheer
                                    <svg class="ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('admin.dashboard')">
                                    📊 Admin Dashboard
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('admin.users.index')">
                                    👥 Gebruikersbeheer
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('admin.faqs.index')">
                                    📚 FAQ beheer
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('faq.suggestions.index')">
                                    💡 FAQ Suggesties
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('comments.index')">
                                    💬 Reactiemoderatie
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endif

                    <!-- Profiel dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white hover:text-gray-700">
                                {{ Auth::user()->name }}
                                <svg class="ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profiles.show', Auth::user())">
                                👤 Mijn profiel
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                ✏️ Profiel bewerken
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    🚪 Log uit
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }"
                              class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile nav -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('news.index')" :active="request()->routeIs('news.*')">
                Nieuws
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/services" :active="request()->is('services')">
                Diensten
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')">
                FAQ
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.*')">
                Contact
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link href="/bookings/create" :active="request()->is('bookings/create')">
                    Boek nu
                </x-responsive-nav-link>

                @if(Auth::user()->is_admin)
                    <x-responsive-nav-link :href="route('admin.dashboard')">
                        Admin Dashboard
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.faqs.index')">
                        FAQ beheer
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('faq.suggestions.index')">
                        FAQ Suggesties
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('comments.index')">
                        Reactiemoderatie
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profiles.show', Auth::user())">
                    Mijn profiel
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profiel bewerken
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log uit
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
