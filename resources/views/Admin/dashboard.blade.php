<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin | TugasKu</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    </head>
    <body class="bg-gray-100 font-sans overflow-hidden">
    <div class="flex h-screen">
        <!-- Main Content Area - Full Width -->
        <div class="flex-1 flex flex-col h-full">
            @include ('layouts.navbar')

            <!-- Content Area with Scroll -->
            <section class="flex-1 overflow-auto p-6">
                <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
                <!-- Pengumuman -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold">Pengumuman</h2>
                        <button id="openModalBtn"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Buat Pengumuman
                        </button>
                    </div>

                    @if($pengumuman->count() > 0)
                        <div class="space-y-4">
                            @foreach($pengumuman as $row)
                                <div class="border-l-4 border-blue-500 pl-4 py-2">
                                    <h3 class="font-semibold text-lg">{{ $row->judul }}</h3>
                                    <p class="text-gray-600 mt-1">{{ $row->konten }}</p>
                                    <p class="text-sm text-gray-400 mt-2">
                                        {{ \Carbon\Carbon::parse($row->created_at)->format('d M Y H:i') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada pengumuman.</p>
                    @endif
                </div>

                <!-- Modal Popup -->
                <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                        <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl font-bold">&times;</button>
                        <h3 class="text-xl font-bold mb-4">Buat Pengumuman Baru</h3>

                        <form action="{{ route('pengumuman.store') }}" method="POST">
                            @csrf
                            <label for="judul" class="block mb-1 font-semibold">Judul</label>
                            <input type="text" name="judul" id="judul" required class="w-full border rounded px-3 py-2 mb-4">

                            <label for="konten" class="block mb-1 font-semibold">Konten</label>
                            <textarea name="konten" id="konten" rows="4" required class="w-full border rounded px-3 py-2 mb-4"></textarea>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Simpan Pengumuman
                            </button>
                        </form>
                    </div>
                </div>

                @if (session('success'))
                    <div id="alert-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div id="alert-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Daftar anggota admin -->
                <section class="mt-8">
                    <h2 class="text-2xl font-bold mb-4">Daftar Anggota Admin</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-6">
                    @foreach ($admins as $admin)
                        <div class="bg-white rounded-2xl shadow-md p-6 relative border border-gray-200 group">

                            <div id="view-card-{{ $admin->id }}">
                                <h2 class="text-lg font-bold">{{ $admin->name }}</h2>
                                <p class="text-sm text-gray-600">{{ $admin->email }}</p>

                                <!-- Tombol aksi -->
                                {{-- @if(auth()->user()->role === 'superadmin') --}}
                                <!-- Benerin dulu bagian authnya baru bisa dipake -->
                                    <div class="absolute top-4 right-4 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <!-- Tombol Edit -->
                                        <button onclick="toggleEdit({{ $admin->id }})"
                                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                            Edit
                                        </button>

                                        <!-- Tombol Delete -->
                                        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" id="delete-form-{{ $admin->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $admin->id }})"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                {{-- @endif --}}
                            </div>

                            <!-- Card edit (hidden by default) -->
                            <div id="edit-card-{{ $admin->id }}" class="hidden">
                                <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <input type="text" name="name" value="{{ $admin->name }}" 
                                        class="w-full border px-3 py-2 mb-2 rounded">
                                    <input type="email" name="email" value="{{ $admin->email }}" 
                                        class="w-full border px-3 py-2 mb-2 rounded">

                                    <div class="flex gap-2">
                                        <button type="submit" 
                                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded">
                                            Simpan
                                        </button>
                                        <button type="button" onclick="toggleEdit({{ $admin->id }})" 
                                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-1 rounded">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

    <script>
        // Fungsi untuk modal konfimasi hapus
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data admin akan terhapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }

        function toggleEdit(id) {
            document.getElementById('view-card-' + id).classList.toggle('hidden');
            document.getElementById('edit-card-' + id).classList.toggle('hidden');
        }

        // Buka modal
        document.getElementById('openModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.remove('hidden');
        });

        // Tutup modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modal').classList.add('hidden');
        });

        // Tutup modal ketika klik di luar konten modal
        window.addEventListener('click', function(e) {
            const modal = document.getElementById('modal');
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Hilangkan pesan setelah 3 detik (3000 ms)
        setTimeout(function() {
            let successAlert = document.getElementById('alert-success');
            let errorAlert = document.getElementById('alert-error');
            
            if (successAlert) {
                successAlert.style.transition = "opacity 0.5s ease";
                successAlert.style.opacity = "0";
                setTimeout(() => successAlert.remove(), 500);
            }

            if (errorAlert) {
                errorAlert.style.transition = "opacity 0.5s ease";
                errorAlert.style.opacity = "0";
                setTimeout(() => errorAlert.remove(), 500);
            }
        }, 3000);
    </script>
    </body>
</html>