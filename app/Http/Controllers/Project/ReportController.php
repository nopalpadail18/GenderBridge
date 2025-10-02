<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view('projects.pelaporan.user.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'evidence' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $evidencePath = null;
        if ($r->hasFile('evidence')) {
            $evidencePath = $r->file('evidence')->store('evidences', 'public');
        }

        Report::create([
            'title' => $r->input('title'),
            'description' => $r->input('description'),
            'location' => $r->input('location'),
            'category' => $r->input('category'),
            'evidence' => $evidencePath,
            'photo' => $r->hasFile('photo') ? $r->file('photo')->store('photos', 'public') : null,
            'status' => 'baru',
        ]);

        return redirect()->route('report.create')->with('success', 'Laporan berhasil dikirim.');
    }

    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('project.report.index', compact('reports'));
    }

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
