<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DisscusionController extends Controller
{
    public function index()
    {
        $dummyCategoriesData = [
            [
                'name' => 'Pengalaman di Kelas',
                'slug' => 'pengalaman-di-kelas',
                'description' => 'Bagikan pengalaman belajar, tips, dan trik akademik Anda.',
                'forum_posts_count' => 24,
                'forum_comments_count' => 156,
                'gradient' => 'from-blue-500 to-blue-600', // Tambahan untuk warna dinamis
            ],
            [
                'name' => 'Keamanan Kampus',
                'slug' => 'keamanan-kampus',
                'description' => 'Diskusi tentang keamanan, tips keselamatan, dan informasi penting.',
                'forum_posts_count' => 18,
                'forum_comments_count' => 89,
                'gradient' => 'from-green-500 to-green-600',
            ],
            [
                'name' => 'Kehidupan Kampus',
                'slug' => 'kehidupan-kampus',
                'description' => 'Cerita, event, dan aktivitas seru di kampus.',
                'forum_posts_count' => 42,
                'forum_comments_count' => 234,
                'gradient' => 'from-purple-500 to-purple-600',
            ],
            [
                'name' => 'Beasiswa & Karir',
                'slug' => 'beasiswa-dan-karir',
                'description' => 'Informasi beasiswa, lowongan kerja, dan pengembangan karir.',
                'forum_posts_count' => 31,
                'forum_comments_count' => 178,
                'gradient' => 'from-orange-500 to-orange-600',
            ],
            [
                'name' => 'Kesehatan & Wellness',
                'slug' => 'kesehatan-dan-wellness',
                'description' => 'Diskusi tentang kesehatan mental, fisik, dan gaya hidup sehat.',
                'forum_posts_count' => 15,
                'forum_comments_count' => 67,
                'gradient' => 'from-red-500 to-red-600',
            ],
            [
                'name' => 'Tanya Jawab Umum',
                'slug' => 'tanya-jawab-umum',
                'description' => 'Pertanyaan umum dan jawaban dari komunitas.',
                'forum_posts_count' => 56,
                'forum_comments_count' => 312,
                'gradient' => 'from-pink-500 to-pink-600',
            ],
        ];

        $categories = collect($dummyCategoriesData)->map(function ($item) {
            return (object) $item;
        });
        return view('projects.ruang_diskusi.index', compact('categories'));
    }

    public function showCategory(string $slug)
    {

        $dummyCategory = (object) [
            'name' => ucwords(str_replace(['-', '_'], ' ', $slug)),
            'description' => 'Bagikan pengalaman belajar, tips, dan trik akademik Anda dengan komunitas',
        ];

        // Pastikan SEMUA objek di bawah ini memiliki struktur yang sama
        $dummyPostsData = collect([
            (object) [
                'title' => 'Tips Menghadapi Ujian Akhir Semester',
                'excerpt' => 'Saya ingin berbagi beberapa tips yang sangat membantu saya dalam menghadapi ujian akhir semester. Pertama, mulai belajar dari jauh-jauh hari...', // <- PASTIKAN ADA
                'user' => (object) ['name' => 'Rina Wijaya'],
                'created_at' => now()->subDays(2),
                'comments_count' => 24,
                'views_count' => 156,
                'likes_count' => 12,
                'is_popular' => true,
            ],
            (object) [
                'title' => 'Rekomendasi Buku Referensi untuk Mata Kuliah Algoritma',
                'excerpt' => 'Saya sedang mencari rekomendasi buku referensi yang bagus untuk mata kuliah Algoritma. Apakah ada yang bisa merekomendasikan?', // <- PASTIKAN ADA
                'user' => (object) ['name' => 'Budi Santoso'],
                'created_at' => now()->subDays(5),
                'comments_count' => 8,
                'views_count' => 67,
                'likes_count' => 3,
                'is_popular' => false,
            ],
            (object) [
                'title' => 'Bagaimana Cara Efektif Membuat Catatan Kuliah?',
                'excerpt' => 'Saya sering kesulitan membuat catatan yang efektif saat kuliah. Catatan saya selalu berantakan dan sulit dipahami kembali...', // <- PASTIKAN ADA
                'user' => (object) ['name' => 'Siti Nurhaliza'],
                'created_at' => now()->subWeek(),
                'comments_count' => 15,
                'views_count' => 89,
                'likes_count' => 7,
                'is_popular' => false,
            ],
            (object) [
                'title' => 'Pengalaman Magang di Perusahaan Tech',
                'excerpt' => 'Saya baru saja menyelesaikan magang di sebuah perusahaan tech dan ingin berbagi pengalaman serta pelajaran yang saya dapatkan...', // <- PASTIKAN ADA
                'user' => (object) ['name' => 'Ahmad Hidayat'],
                'created_at' => now()->subDays(10),
                'comments_count' => 32,
                'views_count' => 234,
                'likes_count' => 28,
                'is_popular' => true,
            ],
            (object) [
                'title' => 'Strategi Belajar Kelompok yang Efektif',
                'excerpt' => 'Belajar kelompok bisa sangat produktif jika dilakukan dengan cara yang tepat. Berikut adalah beberapa strategi yang telah terbukti efektif...', // <- PASTIKAN ADA
                'user' => (object) ['name' => 'Dewi Lestari'],
                'created_at' => now()->subWeeks(2),
                'comments_count' => 19,
                'views_count' => 145,
                'likes_count' => 14,
                'is_popular' => false,
            ],
        ]);

        $posts = new LengthAwarePaginator(
            $dummyPostsData,
            $dummyPostsData->count(),
            5,
            LengthAwarePaginator::resolveCurrentPage(),
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        return view('projects.ruang_diskusi.kategori', [
            'category' => $dummyCategory,
            'posts' => $posts,
        ]);
    }

    public function showPost(string $categorySlug, string $postSlug)
    {
        $dummyCategory = (object) [
            'name' => ucwords(str_replace('-', ' ', $categorySlug)),
            'slug' => $categorySlug,
        ];

        // Data dummy untuk postingan utama
        $dummyPost = (object) [
            'title' => 'Tips Menghadapi Ujian Akhir Semester',
            'slug' => $postSlug,
            'user' => (object) ['name' => 'Rina Wijaya'],
            'created_at' => now()->subDays(2),
            'views_count' => 156,
            'is_popular' => true,
            'content' => '
                <p class="mb-4">Saya ingin berbagi beberapa tips yang sangat membantu saya dalam menghadapi ujian akhir semester. Semoga tips ini juga bisa membantu teman-teman semua.</p>
                <h3 class="text-lg font-bold text-gray-900 mt-6 mb-3">1. Mulai Belajar dari Jauh-jauh Hari</h3>
                <p class="mb-4">Jangan menunggu sampai seminggu sebelum ujian untuk mulai belajar. Mulai dari awal semester dan review materi secara berkala. Ini akan membuat Anda lebih siap dan mengurangi stress.</p>
                <h3 class="text-lg font-bold text-gray-900 mt-6 mb-3">2. Buat Jadwal Belajar yang Terstruktur</h3>
                <p class="mb-4">Buatlah jadwal belajar yang jelas dan realistis. Alokasikan waktu untuk setiap mata kuliah dan pastikan Anda konsisten mengikuti jadwal tersebut.</p>
                <h3 class="text-lg font-bold text-gray-900 mt-6 mb-3">3. Gunakan Teknik Belajar yang Efektif</h3>
                <p class="mb-4">Coba berbagai teknik belajar seperti mind mapping, flashcard, atau mengajar orang lain. Temukan teknik yang paling cocok untuk Anda.</p>
                <h3 class="text-lg font-bold text-gray-900 mt-6 mb-3">4. Jangan Lupa Istirahat dan Olahraga</h3>
                <p class="mb-4">Kesehatan fisik dan mental sangat penting. Pastikan Anda cukup tidur, makan dengan baik, dan berolahraga secara teratur.</p>
                <h3 class="text-lg font-bold text-gray-900 mt-6 mb-3">5. Belajar Bersama Teman</h3>
                <p class="mb-4">Belajar kelompok bisa sangat membantu. Anda bisa saling bertanya dan menjelaskan materi yang sulit dipahami.</p>
            ',
            'likes_count' => 12,
            'comments_count' => 24,
        ];

        // Data dummy untuk daftar komentar
        $dummyComments = collect([
            (object) ['user' => (object) ['name' => 'Ahmad Hidayat'], 'created_at' => now()->subDay(), 'content' => 'Tips yang sangat berguna! Saya akan mencoba menerapkan teknik mind mapping untuk belajar. Terima kasih sudah berbagi pengalaman Anda.', 'likes_count' => 5, 'is_op' => false, 'avatar_color' => 'from-blue-400 to-blue-600'],
            (object) ['user' => (object) ['name' => 'Siti Nurhaliza'], 'created_at' => now()->subDay(), 'content' => 'Saya setuju dengan poin tentang istirahat yang cukup. Saya sering lupa untuk tidur saat persiapan ujian dan akhirnya malah jadi kurang fokus.', 'likes_count' => 3, 'is_op' => false, 'avatar_color' => 'from-green-400 to-green-600'],
            (object) ['user' => (object) ['name' => 'Budi Santoso'], 'created_at' => now()->subDays(2), 'content' => 'Adakah rekomendasi aplikasi atau tools yang bisa membantu dalam membuat jadwal belajar? Saya sering kesulitan untuk konsisten.', 'likes_count' => 8, 'is_op' => false, 'avatar_color' => 'from-purple-400 to-purple-600'],
            (object) ['user' => (object) ['name' => 'Dewi Lestari'], 'created_at' => now()->subDays(2), 'content' => 'Postingan yang sangat membantu! Saya sudah mencoba belajar kelompok dan hasilnya jauh lebih baik dari belajar sendiri.', 'likes_count' => 12, 'is_op' => false, 'avatar_color' => 'from-pink-400 to-pink-600'],
            (object) ['user' => (object) ['name' => 'Rina Wijaya'], 'created_at' => now()->subDays(2), 'content' => '@Budi Santoso Saya biasanya menggunakan Google Calendar untuk membuat jadwal belajar. Aplikasi ini gratis dan mudah digunakan. Semoga membantu!', 'likes_count' => 6, 'is_op' => true, 'avatar_color' => 'from-orange-400 to-orange-600'],
        ]);

        // === BAGIAN DATA DUMMY SELESAI ===

        return view('projects.ruang_diskusi.detail_postingan', [
            'category' => $dummyCategory,
            'post' => $dummyPost,
            'comments' => $dummyComments
        ]);
    }
}
