<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body class="bg-gray-50">
    <x-landing.navbar />
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Breadcrumb Dinamis -->
        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ route('discussion.index') }}" class="text-blue-600 hover:underline">Ruang Diskusi</a> /
            <span class="text-gray-900 font-medium">{{ $category->name }}</span>
        </div>

        <!-- Category Header Dinamis -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8 border-l-4 border-blue-600">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $category->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $category->description }}</p>

            <!-- Create Post Button (Logika untuk Login/Guest) -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-center justify-between">
                @auth
                    {{-- Jika pengguna sudah login --}}
                    <div>
                        <p class="text-blue-900 font-medium">Selamat datang, {{ Auth::user()->name }}!</p>
                        <p class="text-blue-700 text-sm">Siap untuk berbagi pengalaman atau bertanya?</p>
                    </div>
                    <a href="#"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Buat Postingan Baru
                    </a>
                @else
                    {{-- Jika pengguna adalah tamu (belum login) --}}
                    <div>
                        <p class="text-blue-900 font-medium">Ingin berbagi pengalaman?</p>
                        <p class="text-blue-700 text-sm">Silakan Login atau Mendaftar untuk membuat postingan baru</p>
                    </div>
                    {{-- Arahkan ke halaman login --}}
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Login untuk Memulai
                    </a>
                @endauth
            </div>
        </div>

        <!-- Posts List Dinamis -->
        <div class="space-y-4">
            {{-- Lakukan perulangan untuk setiap postingan --}}
            @forelse ($posts as $post)
                <a href="{{ route('discussion.post', [$category->slug ?? 'kategori-dummy', Str::slug($post->title)]) }}"
                    class="block">
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition border border-gray-200">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 hover:text-blue-600 transition">
                                        {{ $post->title }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Dibuat oleh <span
                                            class="font-medium text-gray-900">{{ $post->user->name }}</span> •
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                {{-- Tampilkan tag "Populer" jika is_popular bernilai true --}}
                                @if ($post->is_popular)
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">Populer</span>
                                @endif
                            </div>
                            <p class="text-gray-700 mb-4">{{ $post->excerpt }}</p>
                            <div class="flex gap-6 text-sm text-gray-500">
                                <span>💬 {{ $post->comments_count }} balasan</span>
                                <span>👁️ {{ $post->views_count }} views</span>
                                <span>⭐ {{ $post->likes_count }} likes</span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <p class="text-gray-600">Belum ada postingan di kategori ini. Jadilah yang pertama!</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Dinamis -->
        <div class="mt-8 flex justify-center gap-2">
            {{-- Previous --}}
            @if ($posts->onFirstPage())
                <button aria-disabled="true"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                    ← Sebelumnya
                </button>
            @else
                <a href="{{ $posts->previousPageUrl() }}"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    ← Sebelumnya
                </a>
            @endif

            {{-- Page Links --}}
            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                @if ($i == $posts->currentPage())
                    <span class="px-4 py-2 bg-blue-600 text-white rounded-lg">{{ $i }}</span>
                @else
                    <a href="{{ $posts->url($i) }}"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        {{ $i }}
                    </a>
                @endif
            @endfor

            {{-- Next --}}
            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Selanjutnya →
                </a>
            @else
                <button aria-disabled="true"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                    Selanjutnya →
                </button>
            @endif
        </div>
    </div>
    <x-landing.footer />
</body>

</html>
