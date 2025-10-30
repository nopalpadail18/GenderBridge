<?php

namespace App\Http\Controllers;

use App\Models\Project\Report;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        return view('projects.tracking.index');
    }

    public function show(Request $request)
    {
        $request->validate([
            'tracking_id' => 'required|string|size:8',
        ]);

        $report = Report::where('tracking_id', $request->tracking_id)->first();

        if (!$report) {
            // Jika tidak ditemukan, kembali dengan error
            return redirect()->back()->with('error', 'Kode pelacakan tidak valid atau tidak ditemukan.');
        }

        // Jika ditemukan, tampilkan halaman yang sama dengan data laporan
        return view('projects.tracking.index', ['report' => $report]);
    }
}
