<!-- Category Card 2 -->
<a href="{{ route('forum.category', $category->slug) }}" class="block">
    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition border border-gray-200 h-full flex flex-col">
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

<!-- Category Card 3 -->
