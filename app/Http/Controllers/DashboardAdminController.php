<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Ambil 5 pengumuman terbaru
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')
                        ->limit(5)
                        ->get();

        // lempar data ke view "dashboard"
        return view('Admin/dashboard', compact('pengumuman'));
    }
}