<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Postingan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body class="bg-gray-50">
    <x-landing.navbar />
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Breadcrumb Dinamis -->
        <div class="mb-6 text-sm text-gray-600">
            <a href="{{ route('discussion.index') }}" class="text-blue-600 hover:underline">Ruang Diskusi</a> /
            <a href="{{ route('discussion.category', $category->slug) }}"
                class="text-blue-600 hover:underline">{{ $category->name }}</a> /
            <span class="text-gray-900 font-medium">{{ Str::limit($post->title, 40) }}</span>
        </div>

        <!-- Post Header Dinamis -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6 border-l-4 border-blue-600">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
                    <div class="flex items-center gap-4 text-sm text-gray-600">
                        <span>Dibuat oleh <span class="font-medium text-gray-900">{{ $post->user->name }}</span></span>
                        <span>•</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <span>•</span>
                        <span>👁️ {{ $post->views_count }} views</span>
                    </div>
                </div>
                @if ($post->is_popular)
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full whitespace-nowrap">Populer</span>
                @endif
            </div>

            <!-- Post Content Dinamis -->
            <div class="prose prose-sm max-w-none text-gray-700 mb-6">
                {!! $post->content !!} {{-- Tanda {!! !!} digunakan agar HTML di-render --}}
            </div>

            <!-- Post Actions Dinamis -->
            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <button class="flex items-center gap-2 px-4 py-2 text-gray-600 hover:text-blue-600 transition">
                    <span>⭐</span> <span>{{ $post->likes_count }} Likes</span>
                </button>
                <button class="flex items-center gap-2 px-4 py-2 text-gray-600 hover:text-blue-600 transition">
                    <span>💬</span> <span>{{ $post->comments_count }} Komentar</span>
                </button>
                <button class="flex items-center gap-2 px-4 py-2 text-gray-600 hover:text-blue-600 transition">
                    <span>🔗</span> <span>Bagikan</span>
                </button>
            </div>
        </div>

        <!-- Comments Section Dinamis -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Komentar ({{ $post->comments_count }})</h2>

            <!-- Reply Box Dinamis -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                @auth
                    <p class="text-blue-900 font-medium mb-2">Tinggalkan Komentar</p>
                    <textarea class="w-full border-blue-200 rounded-lg" rows="3" placeholder="Tulis komentar Anda..."></textarea>
                    <button
                        class="mt-4 px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Kirim
                        Komentar</button>
                @else
                    <p class="text-blue-900 font-medium mb-2">Ingin memberikan komentar?</p>
                    <p class="text-blue-700 text-sm mb-4">Silakan Login atau Mendaftar untuk memberikan balasan atau
                        komentar</p>
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                        Login untuk Berkomentar
                    </a>
                @endauth
            </div>

            <!-- Comments List Dinamis -->
            <div class="space-y-6">
                @foreach ($comments as $comment)
                    <div class="border-b border-gray-200 pb-6 last:border-b-0 last:pb-0">
                        <div class="flex gap-4">
                            <div
                                class="w-10 h-10 bg-gradient-to-br {{ $comment->avatar_color }} rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-bold text-gray-900">{{ $comment->user->name }}</span>
                                    <span
                                        class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    @if ($comment->is_op)
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Pembuat
                                            Postingan</span>
                                    @endif
                                </div>
                                <p class="text-gray-700 mb-3">{{ $comment->content }}</p>
                                <div class="flex gap-4 text-sm text-gray-500">
                                    <button class="hover:text-blue-600 transition">👍 Suka
                                        ({{ $comment->likes_count }})
                                    </button>
                                    <button class="hover:text-blue-600 transition">💬 Balas</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Comments (jika ada paginasi) -->
            <div class="text-center mt-8">
                <button
                    class="px-6 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition">
                    Muat Komentar Lainnya
                </button>
            </div>
        </div>
    </div>
    <x-landing.footer />
</body>

</html>
