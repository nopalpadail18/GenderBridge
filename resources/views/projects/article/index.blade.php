 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Article</title>
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
 </head>

 <body>
     <x-landing.navbar />
     <section class="bg-gradient-to-r from-teal-600 to-teal-500 text-white py-12">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <h2 class="text-4xl font-bold mb-4">Artikel Kesetaraan Gender</h2>
             <p class="text-lg text-teal-100 max-w-2xl">Jelajahi artikel-artikel mendalam tentang isu kesetaraan gender,
                 pemberdayaan perempuan, dan inklusi sosial.</p>
         </div>
     </section>

     <!-- Search & Filter Section -->
     <section class="bg-white border-b border-gray-200 py-8">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                 <!-- Search Bar -->
                 <div class="w-full md:w-96">
                     <div class="relative">
                         <!--  Updated focus ring color to teal -->
                         <input type="text" placeholder="Cari artikel..."
                             class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-600">
                         <svg class="absolute right-3 top-3.5 w-5 h-5 text-gray-400" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                         </svg>
                     </div>
                 </div>

                 <!-- Category Filter -->
                 <div class="flex gap-2 flex-wrap justify-center md:justify-end">
                     <button
                         class="px-4 py-2 bg-teal-600 text-white rounded-full text-sm font-medium hover:bg-teal-700 transition">Semua</button>
                     <button
                         class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition">Pendidikan</button>
                     <button
                         class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition">Kesehatan</button>
                     <button
                         class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-sm font-medium hover:bg-gray-300 transition">Pekerjaan</button>
                 </div>
             </div>
         </div>
     </section>

     <!-- Articles Grid -->
     <section class="py-12">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div id="article-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                 <p class="col-span-3 text-center text-gray-500">Memuat artikel...</p>

             </div>

             <!-- Load More Button -->
             <div class="flex justify-center mt-12">
                 <!--  Updated button color to teal -->
                 <button class="px-8 py-3 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-700 transition">
                     Muat Lebih Banyak Artikel
                 </button>
             </div>
         </div>
     </section>

     <x-landing.footer />

     <script>
         async function fetchArticles() {
             const apiUrl =
                 '{{ url('/api/articles') }}?lang=en';
             const articleGrid = document.getElementById('article-grid');

             try {
                 const response = await fetch(apiUrl);
                 if (!response.ok) {
                     throw new Error('Gagal mengambil data dari server.');
                 }
                 const articles = await response.json();

                 articleGrid.innerHTML = '';

                 if (articles.length === 0) {
                     articleGrid.innerHTML =
                         '<p class="col-span-3 text-center text-gray-500">Tidak ada artikel yang ditemukan.</p>';
                     return;
                 }

                 articles.forEach(article => {
                     const description = article.description ? article.description : 'Deskripsi tidak tersedia.';
                     const imageUrl = article.image_url ? article.image_url :
                         'https://via.placeholder.com/400x300.png?text=No+Image';

                     const formattedDate = new Date(article.published_at).toLocaleDateString('id-ID', {
                         day: 'numeric',
                         month: 'long',
                         year: 'numeric'
                     });

                     const articleCard = `
                    <article class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col">
                        <div class="h-48 bg-gray-200">
                            <img src="${imageUrl}" alt="${article.title}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="px-3 py-1 bg-teal-100 text-teal-700 text-xs font-semibold rounded-full">${article.source}</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                <a href="${article.url}" target="_blank" rel="noopener noreferrer" class="hover:text-teal-700">${article.title}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">${description}</p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200 mt-auto">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm text-gray-700 font-medium">${article.author}</span>
                                </div>
                                <span class="text-gray-500 text-sm">${formattedDate}</span>
                            </div>
                        </div>
                    </article>
                `;
                     // Tambahkan kartu artikel ke dalam grid
                     articleGrid.insertAdjacentHTML('beforeend', articleCard);
                 });

             } catch (error) {
                 console.error('Terjadi kesalahan:', error);
                 articleGrid.innerHTML =
                     '<p class="col-span-3 text-center text-red-500">Gagal memuat artikel. Silakan coba lagi nanti.</p>';
             }
         }

         // Panggil fungsi saat halaman selesai dimuat
         document.addEventListener('DOMContentLoaded', fetchArticles);
     </script>
 </body>

 </html>
