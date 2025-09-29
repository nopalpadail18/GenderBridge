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

    <x-landing.navbar />
    {{-- hero --}}
    <section
        class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white overflow-hidden curved-bottom">
        <div class="relative z-10 container mx-auto px-6 py-20 text-center">
            <p class="text-lg mb-4 opacity-90">Selamat Datang di Gender Bridge</p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Mewujudkan Kesetaraan Gender untuk Semua
            </h1>
            <p class="text-lg md:text-xl opacity-80 mb-16 max-w-3xl mx-auto">
                Platform yang mendukung kesetaraan gender dengan menyediakan ruang aman, edukasi, dan akses informasi
                bagi semua tanpa diskriminasi.
            </p>

            <x-landing.hero />
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
            <x-landing.fiture />
        </main>
    </section>

    {{-- article --}}
    <div class="container mx-auto p-4 md:p-8">
        <header class="flex items-center py-4 mb-8">
            <svg class="w-8 h-8 text-biru mr-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd"></path>
            </svg>
            <h1 class="text-2xl font-bold text-gray-800">Article</h1>
        </header>

        <main class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <section class="lg:col-span-2">
                <x-landing.article />
            </section>

            <aside class="lg:col-span-1">
                <!-- Other News Section -->
                <x-landing.aside-article />
            </aside>
        </main>
    </div>

    {{-- Edukasi Video --}}
    <section id="video-edukasi" aria-labelledby="video-edukasi-title" class="bg-white">
        <x-landing.education_video />
    </section>

    {{-- Laporan anonim --}}
    {{-- <section id="laporan" class="py-16 px-4 sm:px-6 lg:px-8">
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
    </section> --}}

    <x-landing.footer />
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
