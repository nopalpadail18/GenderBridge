<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo dan Brand -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-gender-purple to-gender-pink rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <span
                        class="text-xl font-bold bg-gradient-to-r from-gender-purple to-gender-pink bg-clip-text text-transparent">
                        GenderBridge
                    </span>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="#beranda"
                        class="text-gray-700 hover:text-gender-purple px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-b-2 border-transparent hover:border-gender-purple">
                        Beranda
                    </a>
                    <a href="{{ route('report.create') }}"
                        class="text-gray-700 hover:text-gender-pink px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-b-2 border-transparent hover:border-gender-pink">
                        Forum Lapor
                    </a>
                    <a href="#komunitas"
                        class="text-gray-700 hover:text-gender-blue px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-b-2 border-transparent hover:border-gender-blue">
                        Komunitas
                    </a>
                    <a href="#"
                        class="text-gray-700 hover:text-gender-pink px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-b-2 border-transparent hover:border-gender-pink">
                        Edukasi
                    </a>
                    <a href="#"
                        class="text-gray-700 hover:text-gender-blue px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 border-b-2 border-transparent hover:border-gender-blue">
                        Artikel</a>
                    <x-landing.auth-navigasi />
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button"
                    class="text-gray-700 hover:text-gender-purple focus:outline-none focus:text-gender-purple transition-colors duration-200">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#beranda"
                class="text-gray-700 hover:text-gender-purple hover:bg-purple-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Beranda
                </div>
            </a>
            <a href="#forum-lapor"
                class="text-gray-700 hover:text-gender-pink hover:bg-pink-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Forum Lapor
                </div>
            </a>
            <a href="#komunitas"
                class="text-gray-700 hover:text-gender-blue hover:bg-blue-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z">
                        </path>
                    </svg>
                    Komunitas
                </div>
            </a>
            <a href="#forum-lapor"
                class="text-gray-700 hover:text-gender-pink hover:bg-pink-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a1 1 0 01.894.553l7 14A1 1 0 0117 18H3a1 1 0 01-.894-1.447l7-14A1 1 0 0110 2zm0 3.618L4.618 16h10.764L10 5.618zm0 4.382a1 1 0 011 1v2a1 1 0 11-2 0v-2a1 1 0 011-1zm0 6a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                    Edukasi
                </div>
            </a>
            <a href="#komunitas"
                class="text-gray-700 hover:text-gender-blue hover:bg-blue-50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6zm2 2h4v2H8V6zm0 4h4v2H8v-2z" />
                    </svg>
                    Artikel
                </div>
            </a>
            <div class="pt-4 pb-2">
                <x-landing.auth-navigasi />
            </div>
        </div>
    </div>
</nav>
