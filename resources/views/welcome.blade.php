<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">


    <style>
        .curved-bottom {
            clip-path: ellipse(100% 100% at 50% 0%);
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
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
                        <a href="#forum-lapor"
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

    {{-- hero --}}
    <section
        class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white overflow-hidden curved-bottom">
        <!-- Main Content -->
        <div class="relative z-10 container mx-auto px-6 py-20 text-center">
            <!-- Welcome Text -->
            <p class="text-lg mb-4 opacity-90">Selamat Datang di Gender Bridge</p>

            <!-- Main Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Mewujudkan Kesetaraan Gender untuk Semua
            </h1>

            <!-- Description -->
            <p class="text-lg md:text-xl opacity-80 mb-16 max-w-3xl mx-auto">
                Platform yang mendukung kesetaraan gender dengan menyediakan ruang aman, edukasi, dan akses informasi
                bagi semua tanpa diskriminasi.
            </p>

            <!-- Service Buttons -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
                <!-- Telekomunikasi -->
                <div class="flex items-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2"
                                fill="none" />
                            <path d="M4 20c0-4 16-4 16 0" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" />
                            <path d="M12 2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M2 8h2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M20 8h2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium">Pelaporan Secara Anonim</span>
                </div>

                <!-- POS -->
                <div class="flex flex-col md:flex-row md:col-span-3 gap-6">
                    <!-- Komunitas -->
                    <div class="flex items-center group cursor-pointer flex-1">
                        <div
                            class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7 10a3 3 0 116 0 3 3 0 01-6 0zm8 2a2 2 0 100-4 2 2 0 000 4zm-10 0a2 2 0 100-4 2 2 0 000 4zm1.5 2C4.57 14 2 15.17 2 17v1a1 1 0 001 1h7v-2a4 4 0 014-4h1.5c.83 0 1.5.67 1.5 1.5V17a1 1 0 001 1h1a1 1 0 001-1v-1c0-1.83-2.57-3-4.5-3H8.5z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Komunitas</span>
                    </div>

                    <!-- Edukasi -->
                    <div class="flex items-center group cursor-pointer flex-1">
                        <div
                            class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 3L2 8.5l10 5.5 10-5.5L12 3z" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M2 8.5v7a2 2 0 001 1.73l9 5a2 2 0 002 0l9-5A2 2 0 0022 15.5v-7"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 13.5V21" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Edukasi</span>
                    </div>

                    <!-- Artikel -->
                    <div class="flex items-center group cursor-pointer flex-1">
                        <div
                            class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v2h2a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v16h12V8h-4a2 2 0 01-2-2V4H6zm6 0v2a1 1 0 001 1h2V4h-3zm-4 6h8v2H8v-2zm0 4h8v2H8v-2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-medium">Artikel</span>
                    </div>
                </div>

                <!-- E-Scheduling -->
                {{-- <div class="flex flex-col items-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-white/10 rounded-lg flex items-center justify-center mb-3 group-hover:bg-white/20 transition-colors">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium">E-SCHEDULING</span>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section class="px-4 py-16 md:py-24 max-w-6xl mx-auto">
        <header class="text-center mb-12 md:mb-16">
            <h2 class="text-balance text-3xl md:text-4xl font-bold text-slate-900">
                Tentang Gender Bridge
            </h2>
            <p class="mt-3 md:mt-4 text-slate-600">
                Fitur-fitur berikut membantu organisasi membangun lingkungan kerja dan layanan publik yang inklusif,
                aman, dan setara.
            </p>
        </header>

        <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-14 md:gap-16">
            <article class="text-center max-w-md mx-auto">
                <img src="{{ asset('/assets/icon/icon-1.png') }}" alt="Ilustrasi akses setara ke layanan"
                    class="mx-auto h-24 w-32 object-contain" />
                <div class="mt-6 flex items-center justify-center gap-3">
                    <span aria-hidden="true"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-sky-200 bg-sky-50 text-sky-600 font-semibold">1</span>
                    <h3 class="text-lg md:text-xl font-semibold text-slate-900">Akses Setara ke Layanan</h3>
                </div>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Memastikan perempuan, laki-laki, dan kelompok rentan mendapatkan akses yang sama terhadap program,
                    informasi, dan layanan tanpa diskriminasi.
                </p>
            </article>

            <article class="text-center max-w-md mx-auto">
                <img src="{{ asset('/assets/icon/icon-2.png') }}" alt="Ilustrasi dashboard monitoring data terpilah"
                    class="mx-auto h-24 w-32 object-contain" />
                <div class="mt-6 flex items-center justify-center gap-3">
                    <span aria-hidden="true"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-sky-200 bg-sky-50 text-sky-600 font-semibold">2</span>
                    <h3 class="text-lg md:text-xl font-semibold text-slate-900">Data & Pelaporan Terpilah</h3>
                </div>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Mengumpulkan dan menganalisis data terpilah berdasarkan gender untuk pengambilan keputusan yang
                    lebih adil dan berbasis bukti.
                </p>
            </article>


            <article class="text-center max-w-md mx-auto">
                <img src="{{ asset('/assets/icon/icon-3.png') }}" alt="Ilustrasi sistem perlindungan dan pelaporan"
                    class="mx-auto h-24 w-32 object-contain" />
                <div class="mt-6 flex items-center justify-center gap-3">
                    <span aria-hidden="true"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-sky-200 bg-sky-50 text-sky-600 font-semibold">3</span>
                    <h3 class="text-lg md:text-xl font-semibold text-slate-900">Perlindungan & Pelaporan</h3>
                </div>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Kanal aman untuk pengaduan kekerasan/pelecehan berbasis gender, lengkap dengan tindak lanjut dan
                    pengingat kepatuhan.
                </p>
            </article>

            <article class="text-center max-w-md mx-auto">
                <img src="{{ asset('/assets/icon/icon-4.png') }}" alt="Ilustrasi publikasi dan edukasi inklusif"
                    class="mx-auto h-24 w-32 object-contain" />
                <div class="mt-6 flex items-center justify-center gap-3">
                    <span aria-hidden="true"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-sky-200 bg-sky-50 text-sky-600 font-semibold">4</span>
                    <h3 class="text-lg md:text-xl font-semibold text-slate-900">Publikasi & Edukasi Inklusif</h3>
                </div>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Materi kampanye dan panduan berbahasa sederhana untuk membangun budaya organisasi yang menghormati
                    kesetaraan.
                </p>
            </article>

            <article class="text-center max-w-md mx-auto">
                <img src="{{ asset('/assets/icon/icon-5.png') }}" alt="Ilustrasi konsultasi dan komunitas praktik"
                    class="mx-auto h-24 w-32 object-contain" />
                <div class="mt-6 flex items-center justify-center gap-3">
                    <span aria-hidden="true"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-sky-200 bg-sky-50 text-sky-600 font-semibold">5</span>
                    <h3 class="text-lg md:text-xl font-semibold text-slate-900">Konsultasi & Komunitas</h3>
                </div>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Ruang konsultasi dengan ahli dan forum berbagi praktik baik untuk mempercepat transformasi yang
                    setara.
                </p>
            </article>

            <article class="text-center max-w-md mx-auto">
                <img src="{{ asset('/assets/icon/icon-6.png') }}" alt="Ilustrasi integrasi sistem layanan"
                    class="mx-auto h-24 w-32 object-contain" />
                <div class="mt-6 flex items-center justify-center gap-3">
                    <span aria-hidden="true"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-full border-2 border-sky-200 bg-sky-50 text-sky-600 font-semibold">6</span>
                    <h3 class="text-lg md:text-xl font-semibold text-slate-900">Integrasi Layanan</h3>
                </div>
                <p class="mt-3 text-slate-600 leading-relaxed">
                    Terhubung dengan sistem pemerintah/NGO untuk rujukan cepat, pelatihan, dan pelaporan berstandar.
                </p>
            </article>
        </main>
    </section>

    {{-- article --}}
    <div class="container mx-auto p-4 md:p-8">
        <!-- Header -->
        <header class="flex items-center py-4 mb-8">
            <svg class="w-8 h-8 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd"></path>
            </svg>
            <h1 class="text-2xl font-bold text-gray-800">Article Kesetaraan Gender</h1>
        </header>

        <main class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Left -->
            <section class="lg:col-span-2">
                <!-- Featured Article -->
                <article class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                    <img src="/placeholder.svg?height=400&width=800"
                        alt="Tangan terhubung dengan jaringan digital, melambangkan kolaborasi untuk kesetaraan gender"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-gray-500 text-sm mb-2">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>22 hari yang lalu</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3 text-balance">Forum Kesetaraan Gender Sepakati
                            Rencana Induk Prioritas 2025-2029 untuk Perkuat Pemberdayaan Perempuan</h2>
                        <p class="text-gray-700 leading-relaxed">Sekretariat Forum Kesetaraan Gender (FKG)
                            menyelenggarakan Forum Penyelarasan Rencana Induk Prioritas Jangka Menengah (RIPJM)
                            2025-2029 secara daring pada Kamis, 28 Agustus 2025, bersama Kelompok Kerja FKG tingkat
                            pusat, Pembina Isu tingkat pusat, dan Walidata Kementerian/Lembaga.</p>
                    </div>
                </article>

                <!-- Other Main News -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-red-500 pb-2">Berita Utama
                        Lainnya</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- News Card 1 -->
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/placeholder.svg?height=150&width=300" alt="Wanita dalam pertemuan kepemimpinan"
                                class="w-full h-36 object-cover">
                            <div class="p-4">
                                <div class="flex items-center text-gray-500 text-xs mb-1">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>September 03, 2025</span>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2 text-pretty">Sosialisasi Peraturan
                                    Pemerintah Nomor 7 Tahun 2025: Perkuat Tata Kelola Kesetaraan Gender</h4>
                                <a href="#" class="text-red-500 hover:underline text-sm">Read More</a>
                            </div>
                        </article>
                        <!-- News Card 2 -->
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/placeholder.svg?height=150&width=300" alt="Analisis data statistik gender"
                                class="w-full h-36 object-cover">
                            <div class="p-4">
                                <div class="flex items-center text-gray-500 text-xs mb-1">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>September 03, 2025</span>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2 text-pretty">Data Gender Nasional Gelar
                                    Sosialisasi Pedoman Berbagi Pakai DTKS: Menuju Data Inklusif</h4>
                                <a href="#" class="text-red-500 hover:underline text-sm">Read More</a>
                            </div>
                        </article>
                        <!-- News Card 3 -->
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/placeholder.svg?height=150&width=300" alt="Literasi digital untuk wanita"
                                class="w-full h-36 object-cover">
                            <div class="p-4">
                                <div class="flex items-center text-gray-500 text-xs mb-1">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>September 03, 2025</span>
                                </div>
                                <h4 class="font-semibold text-gray-900 mb-2 text-pretty">Forum Kesetaraan Gender
                                    Indonesia Siap Gelar Rencana Induk Data Prioritas 2025-2029</h4>
                                <a href="#" class="text-red-500 hover:underline text-sm">Read More</a>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- More News Section -->
                <div class="mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- News Card 4 -->
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/placeholder.svg?height=150&width=300" alt="Kolaborasi pemberdayaan wanita"
                                class="w-full h-36 object-cover">
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-pretty">Menuju Tata Kelola Kesetaraan
                                    Gender yang Lebih Efektif: Kolaborasi Lintas Sektor</h4>
                            </div>
                        </article>
                        <!-- News Card 5 -->
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/placeholder.svg?height=150&width=300"
                                alt="Kebijakan pemerintah kesetaraan gender" class="w-full h-36 object-cover">
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-pretty">Kementerian PPN/Bappenas
                                    Bersama Forum Kesetaraan Gender Dorong Implementasi Kebijakan Inklusif</h4>
                            </div>
                        </article>
                        <!-- News Card 6 -->
                        <article class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="/placeholder.svg?height=150&width=300" alt="Peran keluarga kesetaraan gender"
                                class="w-full h-36 object-cover">
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 mb-2 text-pretty">Meningkatkan Kesetaraan
                                    Gender: Peran Keluarga dalam Mendorong Perubahan Sosial</h4>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <!-- Sidebar Right -->
            <aside class="lg:col-span-1">
                <!-- Other News Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Berita Lainnya</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                            <span>2020</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                            <span>2021</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                            <span>2022</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                            <span>2023</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                            <span>2024</span>
                        </li>
                        <li class="flex items-center text-gray-700">
                            <span class="w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                            <span>2025</span>
                        </li>
                    </ul>
                </div>

                <!-- Popular News Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <div class="flex justify-between items-center mb-4 border-b-2 border-red-500 pb-2">
                        <h3 class="text-xl font-bold text-gray-800">Populer</h3>
                        <a href="#" class="flex items-center text-red-500 hover:underline text-sm">
                            Lihat Semua
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <img src="/placeholder.svg?height=60&width=60" alt="Ikon kesetaraan gender"
                                class="w-16 h-16 object-cover rounded-md mr-4">
                            <p class="text-gray-800 text-pretty">Satu Data Indonesia Menuju Tata Kelola yang Lebih
                                Efektif: Kolaborasi...</p>
                        </li>
                        <li class="flex items-start">
                            <img src="/placeholder.svg?height=60&width=60" alt="Wanita di bidang teknologi"
                                class="w-16 h-16 object-cover rounded-md mr-4">
                            <p class="text-gray-800 text-pretty">Kementerian PPN/Bappenas Bersama Satu Data Indonesia
                                Dorong...</p>
                        </li>
                        <li class="flex items-start">
                            <img src="/placeholder.svg?height=60&width=60" alt="Kesetaraan gender dalam pendidikan"
                                class="w-16 h-16 object-cover rounded-md mr-4">
                            <p class="text-gray-800 text-pretty">Meningkatkan Kesetaraan Gender: Peran Keluarga dalam
                                Mendorong...</p>
                        </li>
                    </ul>
                </div>

                <!-- Popular Topics Section -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-red-500 pb-2">Topik Populer</h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between items-center text-gray-700">
                            <span>Satu Data Indonesia</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li class="flex justify-between items-center text-gray-700">
                            <span>Satu Data Daerah</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                        <li class="flex justify-between items-center text-gray-700">
                            <span>Data Prioritas</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </li>
                    </ul>
                </div>
            </aside>
        </main>
    </div>

    {{-- Laporan anonim --}}
    <section id="laporan" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">Pelaporan</h2>
                <p class="max-w-2xl mx-auto text-gray-500">
                    Laporkan insiden diskriminasi atau kekerasan berbasis gender dengan aman. Identitas Anda akan
                    terlindungi sepenuhnya.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-biru rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-lock text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-black mb-2">100% An onim</h3>
                            <p class="text-neutral-400">Tidak ada data pribadi yang disimpan atau dapat dilacak</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-biru rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-black mb-2">Respons Cepat</h3>
                            <p class="text-neutral-400">Tim ahli akan menindaklanjuti laporan dalam 24 jam</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-8 h-8 bg-biru rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-heart text-white text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-black mb-2">Dukungan Psikologis</h3>
                            <p class="text-neutral-400">Akses ke konselor profesional dan support group</p>
                        </div>
                    </div>
                </div>

                <div class="bg-biru p-8 rounded-xl border border-neutral-700">
                    <h3 class="text-xl font-semibold text-black mb-6">Buat Laporan</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Jenis Insiden</label>
                            <select
                                class="w-full border border-neutral-600 rounded-lg px-4 py-3 text-black focus:ring-2 focus:ring-accent focus:border-transparent">
                                <option>Pilih jenis insiden</option>
                                <option>Diskriminasi Gender</option>
                                <option>Pelecehan Seksual</option>
                                <option>Kekerasan Domestik</option>
                                <option>Diskriminasi di Tempat Kerja</option>
                                <option>Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Deskripsi Insiden</label>
                            <textarea rows="4"
                                class="w-full  border rounded-lg px-4 py-3 text-black focus:ring-2 focus:ring-accent focus:border-transparent"
                                placeholder="Ceritakan apa yang terjadi..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-black mb-2">Lokasi (Opsional)</label>
                            <input type="text"
                                class="w-full border border-neutral-600 rounded-lg px-4 py-3 text-black focus:ring-2 focus:ring-accent focus:border-transparent"
                                placeholder="Kota atau wilayah">
                        </div>

                        <button type="submit"
                            class="w-full bg-pink text-white py-3 rounded-lg hover:bg-accent/90 transition-colors font-medium">
                            Kirim Laporan Anonim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');

            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });

        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });
    </script>
    <script src="https://example.com/fontawesome/v7.0.1/js/fontawesome.js" data-auto-replace-svg="nest"></script>
</body>

</html>
