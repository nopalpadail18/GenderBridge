<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ruang Diskusi</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body class="bg-gray-50">
    <x-landing.navbar />
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Ruang Diskusi Public</h2>
            <p class="text-gray-600">Bergabunglah dengan komunitas kami dan bagikan pengalaman Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            @foreach ($categories as $category)
                <a href="{{ route('discussion.category', $category->slug) }}" class="block">
                    <div
                        class="bg-white rounded-lg shadow-md hover:shadow-lg transition border border-gray-200 h-full flex flex-col">
                        {{-- Gunakan data gradient dinamis dari controller --}}
                        <div class="bg-gradient-to-r {{ $category->gradient }} h-24 rounded-t-lg"></div>
                        <div class="p-6 flex-grow flex flex-col">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $category->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 flex-grow">{{ $category->description }}</p>
                            <div class="flex justify-between items-center text-sm text-gray-500 mt-auto">
                                <span>📝 {{ $category->forum_posts_count }} postingan</span>
                                <span>💬 {{ $category->forum_comments_count }} balasan</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <x-landing.footer />
</body>

</html>
