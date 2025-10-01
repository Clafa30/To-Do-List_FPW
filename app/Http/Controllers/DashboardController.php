<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TugasKuliah;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $status   = $request->get('status');
        $priority = $request->get('priority');
        $sort     = $request->get('sort', 'deadline_asc'); // default sort

        // Daftar sort yang diizinkan (mapping ke field + direction)
        $allowedSort = [
            'deadline_asc'  => ['deadline', 'asc'],
            'deadline_desc' => ['deadline', 'desc'],
            'priority_desc' => ['prioritas', 'desc'],
            'created_desc'  => ['created_at', 'desc'],
        ];

        // Kalau sort tidak valid, pakai default
        if (!array_key_exists($sort, $allowedSort)) {
            $sort = 'deadline_asc';
        }

        $query = TugasKuliah::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($priority) {
            $query->where('prioritas', $priority);
        }

        // Ambil mapping field dan arah
        [$field, $direction] = $allowedSort[$sort];

        $tasks = $query->orderBy($field, $direction)->get();

        // pass user
        $user = Auth::user();

        return view('user.dashboard', compact('tasks', 'status', 'priority', 'sort', 'user'));
    }
}
