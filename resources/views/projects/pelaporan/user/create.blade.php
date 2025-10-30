<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pelaporan</title>
</head>

<body>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: @json(session('success')),
                icon: 'success',
                confirmButtonColor: '#4f46e5',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <x-landing.navbar />

    <section class="bg-gradient-to-b from-slate-50 to-white py-16">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
                <div class="px-8 py-6 sm:px-10">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 flex items-center justify-center bg-indigo-600 text-white rounded-lg">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-semibold text-slate-800">Form Pelaporan</h2>
                            <p class="text-sm text-slate-500">Laporkan kejadian secara aman dan rahasia. Isilah data di
                                bawah dengan lengkap.</p>
                        </div>
                    </div>

                    @if (session('trackingId'))
                        <div class="py-6">
                            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-md"
                                    role="alert">
                                    <p class="font-bold text-lg">Laporan Anda Telah Diterima!</p>
                                    <p class="mt-2">Mohon simpan kode pelacakan di bawah ini untuk melihat status
                                        laporan Anda nanti.</p>
                                    <div class="mt-4 bg-white p-3 rounded text-center">
                                        <p class="text-2xl font-bold tracking-widest text-gray-800" id="trackingCode">
                                            {{ session('trackingId') }}
                                        </p>
                                    </div>
                                    <div class="mt-3 flex items-center justify-center sm:justify-start gap-3">
                                        <button onclick="copyToClipboard()"
                                            class="text-sm font-semibold text-blue-600 hover:underline">Salin
                                            Kode</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function copyToClipboard() {
                                const code = document.getElementById('trackingCode').innerText;
                                navigator.clipboard.writeText(code).then(() => {
                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Kode berhasil disalin!',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                });
                            }
                        </script>
                    @endif

                    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Incident Type</label>
                                <input type="text" name="incident_type" value="{{ old('incident_type') }}" required
                                    class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                                @error('incident_type')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700">Urgency Level</label>
                                <select name="urgency_level" required
                                    class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
                                    <option value="">-- Pilih Tingkat Urgensi --</option>
                                    <option value="low" {{ old('urgency_level') == 'low' ? 'selected' : '' }}>Rendah
                                        (Low)</option>
                                    <option value="medium" {{ old('urgency_level') == 'medium' ? 'selected' : '' }}>
                                        Sedang (Medium)</option>
                                    <option value="high" {{ old('urgency_level') == 'high' ? 'selected' : '' }}>Tinggi
                                        (High)</option>
                                </select>
                                @error('urgency_level')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Location Type</label>
                                <select name="location_type"
                                    class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300">
                                    <option value="">-- Pilih Tipe Lokasi --</option>
                                    <option value="indoor" {{ old('location_type') == 'indoor' ? 'selected' : '' }}>
                                        Indoor</option>
                                    <option value="outdoor" {{ old('location_type') == 'outdoor' ? 'selected' : '' }}>
                                        Outdoor</option>
                                    <option value="online" {{ old('location_type') == 'online' ? 'selected' : '' }}>
                                        Online</option>
                                    <option value="other" {{ old('location_type') == 'other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                @error('location_type')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700">Incident Date</label>
                                <input type="date" name="incident_date" value="{{ old('incident_date') }}" required
                                    class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                                @error('incident_date')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Location Detail</label>
                            <textarea name="location_detail" rows="3" required
                                class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300">{{ old('location_detail') }}</textarea>
                            @error('location_detail')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Deskripsi Kejadian</label>
                            <textarea name="description" rows="6" required
                                class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-300">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Bukti (Upload File)</label>
                            <input type="file" name="evidence_files[]" multiple
                                accept="image/*,video/*,application/pdf"
                                class="mt-1 block w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300" />
                            <p class="mt-1 text-xs text-slate-500">Unggah foto, video, atau dokumen (jpg, png, mp4,
                                pdf). Maks 5 file, maksimal ukuran per file sesuai kebijakan.</p>
                            @error('evidence_files')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            @error('evidence_files.*')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4 pt-2">
                            <div class="flex items-center gap-3">
                                <a href="{{ url()->previous() }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium text-slate-700 bg-slate-50 border border-slate-200 hover:bg-slate-100">
                                    <i class="fa-solid fa-arrow-left"></i> Batal
                                </a>

                                {{-- Tombol untuk menuju view pelacakan laporan.
                                            Sesuaikan nama route/URL jika berbeda di aplikasi Anda --}}
                                <a href="{{ route('report.track.form') }}"
                                    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                    <i class="fa-solid fa-search"></i> Lihat Pelacakan
                                </a>
                            </div>

                            <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow">
                                <i class="fa-solid fa-paper-plane"></i> Kirim Laporan
                            </button>
                        </div>

                        <script>
                            function openTrackDialog() {
                                Swal.fire({
                                    title: 'Lacak Laporan',
                                    input: 'text',
                                    inputLabel: 'Masukkan kode pelacakan',
                                    inputPlaceholder: 'Contoh: ABC123',
                                    showCancelButton: true,
                                    confirmButtonText: 'Lacak',
                                    cancelButtonText: 'Batal',
                                    inputValidator: (value) => {
                                        if (!value) {
                                            return 'Kode pelacakan wajib diisi';
                                        }
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed && result.value) {
                                        const code = encodeURIComponent(result.value.trim());
                                        window.location.href = '{{ route('report.track.form') }}?code=' + code;
                                    }
                                });
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-landing.footer />

    <script>
        function copyToClipboard() {
            const code = document.getElementById('trackingCode').innerText;
            navigator.clipboard.writeText(code).then(() => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Kode berhasil disalin!',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        }
    </script>
</body>

</html>
