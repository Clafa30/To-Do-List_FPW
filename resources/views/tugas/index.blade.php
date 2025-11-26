@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}?v={{ time() }}">
    <style>
        /* Notif overlay */
        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 2000;
            min-width: 300px;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            animation: fadeIn .3s ease;
        }

        /* Warna alert */
        .custom-alert-success {
            background: #28a745;
            color: #fff;
        }

        .custom-alert-danger {
            background: #dc3545;
            color: #fff;
        }

        /* animasi */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* action-button */
        .action-buttons {
            display: flex;
            gap: .5rem;
            width: 20%;
        }

        .action-buttons form,
        .action-buttons a,
        .action-buttons .action-button {
            display: flex;
            justify-content: center;
            align-items: center;
            display: flex;
            gap: .5rem;
            min-width: 100%;
        }

        .action-button {
            width: 20%;
            height: 45px;
            border-radius: .5rem;
            font-size: 1.2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Flip Card Styles */
        .flip-card {
            background-color: transparent;
            perspective: 1000px;
            height: 100%;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            border-radius: .75rem;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: .75rem;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .flip-card-front {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .flip-card-back {
            background-color: #f8f9fa;
            transform: rotateY(180deg);
            gap: .5rem;
        }

        .flip-card-front .deskripsi {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .badge-prioritas-rendah {
            background-color: #6c757d;
        }

        .badge-prioritas-sedang {
            background-color: #ffc107;
            color: #212529;
        }

        .badge-prioritas-tinggi {
            background-color: #dc3545;
            color: #fff;
        }

        .badge-status-pending {
            background-color: #ffc107;
            color: #212529;
        }

        .badge-status-selesai {
            background-color: #198754;
            color: #fff;
        }

        .pagination-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .pagination-info {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: .5rem;
        }

        .pagination-buttons nav {
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            border-radius: .5rem;
            color: #4ECDC4;
            border: none;
            padding: .5rem .75rem;
            transition: background 0.3s;
        }

        .pagination .page-item.active .page-link {
            background-color: #4ECDC4;
            color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .pagination .page-link:hover {
            background-color: #4ECDC4;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="container">

        {{-- Pengumuman --}}
        @if(isset($marquee) && $marquee)

            <div class="running-container">
                <div class="running-text">
                    <strong>{{ $marquee->judul }}:</strong> {{ $marquee->konten }}
                </div>
            </div>
        @endif

        @include('components.alert')

        {{-- SEARCH + FILTER --}}
        <div class="card p-3 mb-4 shadow-sm">
            <form action="{{ route('tugas.index') }}" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari tugas..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="priority" class="form-select">
                        <option value="">Semua Prioritas</option>
                        <option value="rendah" {{ request('priority') == 'rendah' ? 'selected' : '' }}>Rendah</option>
                        <option value="sedang" {{ request('priority') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="tinggi" {{ request('priority') == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('tugas.export.pdf', request()->all()) }}" class="btn btn-danger w-100"><i
                            class="bi bi-file-earmark-pdf"></i> Export PDF</a>
                </div>
            </form>
        </div>

        {{-- RANDOM COLOR ARRAY --}}
        @php
            $colors = ['red', 'blue', 'green', 'purple', 'orange', 'pink', 'teal', 'amber'];
        @endphp

        {{-- TUGAS --}}
        @if($tasks->isEmpty())
            <p class="text-muted">Belum ada tugas.</p>
        @else
            <div id="tasksContainer">
                @foreach($tasks as $tugas)
                    {{-- Generate warna random berdasarkan ID --}}
                    @php
                        $colorClass = "card-" . $colors[$tugas->id % count($colors)];
                    @endphp
                    <div class="task-card {{ $colorClass }}" data-status="{{ $tugas->status }}">
                        <div class="card-inner"> <!-- wrapper putih FULL -->
                            <div class="flip-card h-100">
                                <div class="flip-card-inner h-100 d-flex flex-column">
                                    {{-- Front --}}
                                    <div class="flip-card-front h-100 d-flex flex-column">
                                        <h5 class="fw-bold text-primary">{{ $tugas->judul }}</h5>
                                        <p class="deskripsi flex-grow-1">{{ $tugas->deskripsi }}</p>
                                        <p class="mb-1"><i class="bi bi-calendar"></i> <strong>Deadline:</strong>
                                            {{ $tugas->deadline ? \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') : '-' }}
                                        </p>
                                        <p class="mb-1"><i class="bi bi-flag"></i> <strong>Prioritas:</strong>
                                            <span class="badge 
                                                {{ $tugas->prioritas == 'rendah' ? 'badge-prioritas-rendah' : '' }}
                                                {{ $tugas->prioritas == 'sedang' ? 'badge-prioritas-sedang' : '' }}
                                                {{ $tugas->prioritas == 'tinggi' ? 'badge-prioritas-tinggi' : '' }}
                                            ">
                                                {{ ucfirst($tugas->prioritas) }}
                                            </span>
                                        </p>
                                        <p class="mb-0"><i class="bi bi-check2-circle"></i> <strong>Status:</strong>
                                            <span
                                                class="badge {{ $tugas->status == 'pending' ? 'badge-status-pending' : 'badge-status-selesai' }}">
                                                {{ ucfirst($tugas->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    {{-- Back --}}
                                    <div class="flip-card-back">
                                        <p class="mb-2">
                                            <strong>Detail:</strong><br>
                                            {{ $tugas->deskripsi }}
                                        </p>
<div class="action-buttons">
    {{-- Edit --}}
    <a href="{{ route('tugas.edit', $tugas->id) }}" class="action-button btn-primary" title="Edit">
        <i class="bi bi-pencil-square"></i>
    </a>

    {{-- Tandai Selesai --}}
    <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="selesai">
        <button type="submit" class="action-button btn-success" title="Tandai Selesai">
            <i class="bi bi-check2-circle"></i>
        </button>
    </form>

    {{-- Hapus --}}
    <form action="{{ route('tugas.destroy', $tugas->id) }}" method="POST"
        onsubmit="return confirm('Hapus tugas ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="action-button btn-danger" title="Hapus">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- end white wrapper -->
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                <div class="pagination-info">
                    Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }} results
                </div>
                <div class="pagination-buttons">
                    {{ $tasks->links() }}
                </div>
            </div>
        @endif
    </div>
    <!-- === Colorful Soft Background === -->
    <div id="blob1" class="blob"></div>
    <div id="blob2" class="blob"></div>
    <div id="blob3" class="blob"></div>
    <!-- Ripple container -->
    <div id="ripple-bg">
    </div>
    <script>
        // === Blob Interaktif Elegan ===
        document.addEventListener("mousemove", (e) => {
            const x = e.clientX;
            const y = e.clientY;
            document.getElementById("blob1").style.transform = `translate(${x / 1.2}px, ${y / 1.2}px)`;
            document.getElementById("blob2").style.transform = `translate(${x / 2.2}px, ${y / 2.2}px)`;
            document.getElementById("blob3").style.transform = `translate(${x / 3.2}px, ${y / 3.2}px)`;
        });

        // === Ripple Effect Klik ===
        document.addEventListener("click", (e) => {
            const ripple = document.createElement("span");
            ripple.classList.add("ripple");
            ripple.style.left = `${e.clientX}px`;
            ripple.style.top = `${e.clientY}px`;
            document.getElementById("ripple-bg").appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    </script>
@endsection