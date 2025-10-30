<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Pengaduan') }}
        </h2>
    </x-slot>

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
    @else
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: @json(session('success')),
                icon: 'error',
                confirmButtonColor: '#4f46e5',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Tipe Insiden</th>
                                    <th class="py-2 px-4 border-b">Tanggal Insiden</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b" style="width: 30%;">Aksi Update Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($reports as $report)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $report->incident_type }}</td>
                                        <td class="py-2 px-4 border-b">
                                            {{ \Carbon\Carbon::parse($report->incident_date)->format('d M Y') }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full
                                                @if ($report->status == 'new') bg-blue-100 text-blue-800 @endif
                                                @if ($report->status == 'in_review') bg-yellow-100 text-yellow-800 @endif
                                                @if ($report->status == 'resolved') bg-green-100 text-green-800 @endif
                                                @if ($report->status == 'archived') bg-gray-100 text-gray-800 @endif">
                                                {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            @if ($report->status == 'resolved' || $report->status == 'archived')
                                                {{-- JIKA SUDAH FINAL: Tampilkan teks dan non-aktifkan form --}}
                                                <span class="text-xs text-gray-500 italic">Status Final</span>
                                            @else
                                                <form action="{{ route('admin.reports.updateStatus', $report->id) }}"
                                                    method="POST" class="flex items-center gap-2">
                                                    @csrf
                                                    <select name="status" onchange="this.form.submit()"
                                                        class="block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                        <option value="new" @selected($report->status == 'new')>Baru
                                                        </option>
                                                        <option value="in_review" @selected($report->status == 'in_review')>Diproses
                                                        </option>
                                                        <option value="resolved" @selected($report->status == 'resolved')>Selesai
                                                        </option>
                                                        <option value="archived" @selected($report->status == 'archived')>Diarsipkan
                                                        </option>
                                                    </select>

                                                    <a href="{{ route('admin.reports.show', $report) }}"
                                                        class="inline-block px-3 py-1.5 bg-gray-200 text-gray-800 rounded-md text-sm font-semibold hover:bg-gray-300"
                                                        title="Lihat detail">Detail</a>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                                            Belum ada laporan yang masuk.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $reports->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
