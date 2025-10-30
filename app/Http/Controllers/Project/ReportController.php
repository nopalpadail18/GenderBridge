<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    // User Biasa
    public function create()
    {
        return view('projects.pelaporan.user.create');
    }

    public function store(Request $r)
    {

        $r->validate([
            'incident_type' => 'required|string|max:255',
            'urgency_level' => ['required', Rule::in(['low', 'medium', 'high'])],
            'location_type' => 'required|string|max:255',
            'incident_date' => 'required|date',
            'location_detail' => 'required|string',
            'description' => 'required|string',
            'evidence_files' => 'nullable|array',
            'evidence_files.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,mp4|max:2048',
        ]);

        do {
            $trackingId = Str::upper(Str::random(8));
        } while (Report::where('tracking_id', $trackingId)->exists());

        $evidencePath = [];
        if ($r->hasFile('evidence_files')) {
            foreach ($r->file('evidence_files') as $file) {
                $path = $file->store('evidences', 'public');
                $evidencePath[] = $path;
            }
        }


        Report::create([
            'tracking_id' => $trackingId,
            'incident_type' => $r->input('incident_type'),
            'urgency_level' => $r->input('urgency_level'),
            'location_type' => $r->input('location_type'),
            'incident_date' => $r->input('incident_date'),
            'location_detail' => $r->input('location_detail'),
            'description' => $r->input('description'),
            'evidence_links' => !empty($evidencePaths) ? json_encode($evidencePaths) : null,
        ]);


        return redirect()->route('report.create')->with('success', 'Laporan berhasil dikirim.')->with('trackingId', $trackingId);;
    }

    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('projects.admin.pelaporan.report', compact('reports'));
    }

    // Admin
    /**
     * Menampilkan halaman detail untuk satu laporan spesifik.
     * Menggunakan Route Model Binding (Report $report)
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\View\View
     */
    public function show(Report $report)
    {
        return view('projects.admin.pelaporan.detail-pelaporan', compact('report'));
    }

    public function addNote(Request $request, Report $report)
    {
        $request->validate([
            'admin_notes' => 'required|string',
        ]);

        $report->update([
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', 'Catatan berhasil disimpan.');
    }

    public function updateStatus(Request $request, Report $report)
    {
        if ($report->status === 'resolved' || $report->status === 'archived') {
            return redirect()->back()->with('error', 'Gagal! Status laporan yang sudah Selesai atau Diarsipkan tidak dapat diubah lagi.');
        }
        $request->validate([
            'status' => ['required', Rule::in(['new', 'in_review', 'resolved', 'archived'])],
        ]);

        $report->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
