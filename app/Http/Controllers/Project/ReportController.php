<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        // dd($r->all());

        $evidencePath = [];
        if ($r->hasFile('evidence_files')) {
            foreach ($r->file('evidence_files') as $file) {
                $path = $file->store('evidences', 'public');
                $evidencePath[] = $path;
            }
        }


        Report::create([
            'incident_type' => $r->input('incident_type'),
            'urgency_level' => $r->input('urgency_level'),
            'location_type' => $r->input('location_type'),
            'incident_date' => $r->input('incident_date'),
            'location_detail' => $r->input('location_detail'),
            'description' => $r->input('description'),
            'evidence_links' => !empty($evidencePaths) ? json_encode($evidencePaths) : null,
        ]);


        return redirect()->route('report.create')->with('success', 'Laporan berhasil dikirim.');
    }

    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('projects.admin.pelaporan.report', compact('reports'));
    }

    // Admin

    public function updateStatus(Request $r, $id)
    {
        $r->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $report = Report::findOrFail($id);
        $report->status = $r->input('status');
        $report->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
