<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lacak laporan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Tombol Kembali -->
                    <a href="/"
                        class="mb-4 inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        <i class="fa fa-arrow-left mr-2"></i> Kembali
                    </a>

                    <p class="text-gray-600 mb-4">Masukkan 8 karakter kode pelacakan yang Anda terima saat membuat
                        laporan.</p>

                    <form action="{{ route('report.track.show') }}" method="POST">
                        @csrf
                        <div class="flex items-center gap-2">
                            <input type="text" name="tracking_id" placeholder="Contoh: CGLB98K2" required
                                maxlength="8"
                                class="block w-full rounded-md border-gray-300 shadow-sm uppercase placeholder:normal-case">
                            <button type="submit"
                                class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">
                                Lacak
                            </button>
                        </div>
                        @error('tracking_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </form>

                    @if (session('error'))
                        <div class="mt-6 p-4 bg-red-100 text-red-700 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
            </div>

            {{-- TAMPILKAN HASIL JIKA DITEMUKAN --}}
            @if (isset($report))
                <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Hasil Pelacakan untuk Kode:
                            {{ $report->tracking_id }}</h3>
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tipe Insiden</dt>
                                <dd class="mt-1 text-gray-900">{{ $report->incident_type }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tanggal Dilaporkan</dt>
                                <dd class="mt-1 text-gray-900">
                                    {{ $report->created_at->isoFormat('dddd, D MMMM YYYY, HH:mm') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Status Saat Ini</dt>
                                <dd class="mt-1">
                                    <span
                                        class="px-3 py-1 text-sm font-bold rounded-full
                                        @if ($report->status == 'new') bg-blue-100 text-blue-800 @endif
                                        @if ($report->status == 'in_review') bg-yellow-100 text-yellow-800 @endif
                                        @if ($report->status == 'resolved') bg-green-100 text-green-800 @endif
                                        @if ($report->status == 'archived') bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                                    </span>
                                </dd>
                            </div>
                            @if ($report->admin_notes)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Catatan/Tindak Lanjut</dt>
                                    <dd class="mt-1 text-gray-800 whitespace-pre-wrap">{{ $report->admin_notes }}</dd>
                                </div>
                            @endif

                        </dl>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>

</html>
