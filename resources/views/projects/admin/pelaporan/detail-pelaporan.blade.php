<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Laporan: {{ $report->incident_type }}
            </h2>
            <a href="{{ route('admin.reports.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm font-semibold">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Kolom Kiri: Detail Laporan -->
                <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tipe Insiden</dt>
                                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $report->incident_type }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Status Laporan</dt>
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
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tanggal Insiden</dt>
                                <dd class="mt-1 text-gray-900">
                                    {{ \Carbon\Carbon::parse($report->incident_date)->isoFormat('dddd, D MMMM YYYY') }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tingkat Urgensi</dt>
                                <dd class="mt-1 text-gray-900 uppercase font-medium">{{ $report->urgency_level }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Tipe Lokasi</dt>
                                <dd class="mt-1 text-gray-900">{{ $report->location_type }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Detail Lokasi</dt>
                                <dd class="mt-1 text-gray-900">{{ $report->location_detail }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Deskripsi Kejadian</dt>
                                <dd class="mt-1 text-gray-800 whitespace-pre-wrap">{{ $report->description }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Kolom Kanan: Bukti dan Catatan Admin -->
                <div class="space-y-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="font-semibold text-lg mb-4">Bukti Pendukung</h3>
                            @php
                                $evidenceLinks = !empty($report->evidence_links)
                                    ? json_decode($report->evidence_links)
                                    : [];
                            @endphp

                            @if (!empty($evidenceLinks))
                                <ul class="space-y-3">
                                    @foreach ($evidenceLinks as $path)
                                        @php
                                            $url = Storage::url($path);
                                            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                        @endphp
                                        <li>
                                            @if ($isImage)
                                                <a href="{{ $url }}" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <img src="{{ $url }}" alt="Bukti Gambar"
                                                        class="rounded-lg border hover:opacity-80 transition-opacity">
                                                </a>
                                            @else
                                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                                    class="text-indigo-600 hover:text-indigo-800 font-medium underline flex items-center gap-2">
                                                    <i class="fa-solid fa-file-arrow-down"></i>
                                                    <span>Lihat File ({{ basename($path) }})</span>
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 text-sm">Tidak ada bukti yang diunggah.</p>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="font-semibold text-lg mb-4">Catatan Admin</h3>
                            <form action="{{ route('admin.reports.addNote', $report) }}" method="POST">
                                @csrf
                                <textarea name="admin_notes" rows="5"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('admin_notes', $report->admin_notes) }}</textarea>
                                @error('admin_notes')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                                <div class="mt-4">
                                    <button type="submit"
                                        class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 font-semibold">Simpan
                                        Catatan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
