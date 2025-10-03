@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@section('title', 'Dashboard Admin | TugasKu')

@section('content')
<div class="container">

    {{-- Alerts --}}
    @if (session('success'))
        <div id="alert-success" class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div id="alert-error" class="alert alert-error">{{ session('error') }}</div>
    @endif

    {{-- Pengumuman --}}
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2>Pengumuman Terbaru</h2>
            <div>
                <button id="openModalBtn" style="background:#3b82f6; color:#fff; padding:6px 10px; border-radius:5px;">
                    <i class="bi bi-plus"></i> <span>Buat</span>
                </button>
                <button id="newsLogBtn" style="background:#6b7280; color:#fff; padding:6px 10px; border-radius:5px;">
                    <i class="bi bi-newspaper"></i> <span>News Log</span>
                </button> 
            </div>
        </div>

        @if($pengumuman->count() > 0)
            @php $latest = $pengumuman->first(); @endphp
            <div class="pengumuman-card">
                <h3>{{ $latest->judul }}</h3>
                <p>{{ Str::limit($latest->konten, 100) }}</p>
                <small>{{ \Carbon\Carbon::parse($latest->created_at)->format('d M Y H:i') }}</small>
            </div>
        @else
            <p>Belum ada pengumuman.</p>
        @endif
    </div>

    {{-- Daftar Admin --}}
    <div class="card">
        <h2>Daftar Admin</h2>
        <div class="admin-grid">
            @foreach ($admins as $admin)
            <div class="admin-card">
                <h3>{{ $admin->name }}</h3>
                <p>{{ $admin->email }}</p>
                <span class="badge badge-role">{{ ucfirst($admin->role) }}</span>
                <div class="action-buttons">
                    <button class="edit" onclick="openEditModal({{ $admin->id }}, '{{ $admin->name }}', '{{ $admin->email }}')">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="button" class="delete" onclick="confirmDelete({{ $admin->id }})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- OTP Admin --}}
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2>Manage OTP Admin</h2>
            <form action="{{ route('admin.otp.store') }}" method="POST">
                @csrf
                <button style="background:#3b82f6; color:#fff; padding:6px 10px; border-radius:5px;">Buat Baru</button>
            </form>
        </div>
        <div class="otp-grid">
            @foreach($otps as $otp)
            <div class="otp-card">
                <h3>Kode: <span style="font-family:monospace;">{{ $otp->code }}</span></h3>
                <span class="badge {{ $otp->status==='used'?'badge-used':'badge-unused' }}">{{ ucfirst($otp->status) }}</span>
                <p>Digunakan oleh: {{ $otp->user?->name ?? '-' }} {{ $otp->user?->email ?? '' }}</p>
                <form action="{{ route('admin.otp.destroy', $otp->id) }}" method="POST" onsubmit="return confirm('Yakin hapus OTP?')">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="otp-delete-btn"><i class="bi bi-trash"></i></button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

</div>

{{-- Modal Pengumuman --}}
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalBtn">&times;</span>
        <h3>Buat Pengumuman Baru</h3>
        <form action="{{ route('pengumuman.store') }}" method="POST">
            @csrf
            <input type="text" name="judul" placeholder="Judul">
            <textarea name="konten" placeholder="Konten" rows="4"></textarea>
            <button type="submit" style="background:#3b82f6;color:#fff;padding:6px 10px;border-radius:5px;">Buat</button>
        </form>
    </div>
</div>

{{-- Modal Edit Admin --}}
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeEditModal">&times;</span>
        <h3>Edit Admin</h3>
        <form id="editAdminForm" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" id="editName" placeholder="Nama">
            <input type="email" name="email" id="editEmail" placeholder="Email">
            <button type="submit" style="background:#10b981;color:#fff;padding:6px 10px;border-radius:5px;">Simpan</button>
        </form>
    </div>
</div>

{{-- Modal News Log --}}
<div id="newsModal" class="modal">
    <div class="modal-content" style="max-height:80vh; overflow-y:auto;">
        <span class="close" id="closeNewsModal">&times;</span>
        <h3>News Log</h3>
        @foreach($pengumuman as $row)
        <div class="pengumuman-card">
            <h4>{{ $row->judul }}</h4>
            <p>{{ $row->konten }}</p>
            <small>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}</small>
            <hr>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin hapus?',
        text: "Data akan hilang permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) document.getElementById('delete-form-'+id).submit();
    });
}

// Edit admin modal
function openEditModal(id, name, email){
    document.getElementById('editModal').style.display='flex';
    document.getElementById('editName').value=name;
    document.getElementById('editEmail').value=email;
    document.getElementById('editAdminForm').action='/admin/'+id; // sesuaikan route
}

// Modal controls
document.getElementById('openModalBtn').addEventListener('click', ()=>{ document.getElementById('modal').style.display='flex'; });
document.getElementById('closeModalBtn').addEventListener('click', ()=>{ document.getElementById('modal').style.display='none'; });
document.getElementById('closeEditModal').addEventListener('click', ()=>{ document.getElementById('editModal').style.display='none'; });
document.getElementById('newsLogBtn').addEventListener('click', ()=>{ document.getElementById('newsModal').style.display='flex'; });
document.getElementById('closeNewsModal').addEventListener('click', ()=>{ document.getElementById('newsModal').style.display='none'; });

// Auto fade alerts
setTimeout(()=>{
    const s=document.getElementById('alert-success');
    const e=document.getElementById('alert-error');
    if(s){ s.style.opacity=0; setTimeout(()=>s.remove(),500);}
    if(e){ e.style.opacity=0; setTimeout(()=>e.remove(),500);}
}, 3000);
</script>
@endsection
