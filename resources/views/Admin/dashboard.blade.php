<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | TugasKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    <?php @include 'layouts.sidebar'; ?>
    <div class="flex-1 flex flex-col overflow-auto sm:ml-0 md:ml-80 lg:ml-80 xl:ml-80">
        <?php @include 'includes.navbar'; ?>

        <section class="p-6 space-y-6">
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
            <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 text-xl font-bold">&times;</button>
                    <h3 class="text-xl font-bold mb-4">Buat Pengumuman Baru</h3>
                    <form action="proses_buat_pengumuman.php" method="post">
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
        </section>
    </div>
</div>

<script>

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

</script>
</body>
</html>
