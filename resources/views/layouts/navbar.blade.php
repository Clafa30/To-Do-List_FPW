<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TugasKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- ====================== HEADER ====================== -->
    <header class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">

            <!-- Judul -->
            <div class="flex items-center gap-2">
                @if(Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
                    <i class="bi bi-speedometer2 text-xl text-blue-600"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard Admin</h2>
                @else
                    <i class="bi bi-journal-check text-xl text-blue-600"></i>
                    <h1 class="text-xl font-semibold text-gray-800">TugasKu</h1>
                @endif
            </div>

            <!-- Area kanan -->
            <div class="flex items-center gap-3">

                <!-- ====== Tombol Tambah & Filter (User Only) ====== -->
                @if(Auth::user()->role === 'user')

                    <!-- Tambah -->
                    <a href="{{ route('tugas.create') }}" class="p-2 rounded-full hover:bg-gray-100 transition"
                        title="Tambah Tugas">
                        <i class="bi bi-plus-circle text-xl text-blue-600"></i>
                    </a>

                    <!-- Filter -->
                    <button id="filterToggleBtn"
                        class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition"
                        title="Filter">
                        <i class="bi bi-funnel-fill text-xl text-gray-600"></i>
                    </button>

                    <!-- Modal Filter -->
                    <div id="filterModal"
                        class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">

                        <div class="bg-white rounded-lg shadow-lg p-6 w-80 max-w-full relative">

                            <span id="closeFilterModal"
                                class="absolute top-2 right-3 text-gray-400 cursor-pointer text-xl">&times;</span>

                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Filter Tugas</h3>

                            <form method="GET" action="{{ route('tugas.index') }}" class="flex flex-col gap-3">

                                <div>
                                    <label class="text-sm font-medium text-gray-700">Status</label>
                                    <select name="status" class="w-full border rounded px-2 py-1">
                                        <option value="">Semua</option>
                                        <option value="pending">Pending</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-sm font-medium text-gray-700">Prioritas</label>
                                    <select name="priority" class="w-full border rounded px-2 py-1">
                                        <option value="">Semua</option>
                                        <option value="rendah">Rendah</option>
                                        <option value="sedang">Sedang</option>
                                        <option value="tinggi">Tinggi</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="text-sm font-medium text-gray-700">Deadline sebelum</label>
                                    <input type="date" name="deadline" class="w-full border rounded px-2 py-1">
                                </div>

                                <div>
                                    <label class="text-sm font-medium text-gray-700">Sort by</label>
                                    <select name="sort" class="w-full border rounded px-2 py-1">
                                        <option value="deadline_asc">Deadline Terdekat</option>
                                        <option value="deadline_desc">Deadline Terjauh</option>
                                        <option value="priority_desc">Prioritas Tinggi</option>
                                        <option value="created_desc">Terbaru</option>
                                    </select>
                                </div>

                                <div class="flex justify-end gap-2 mt-2">
                                    <button type="submit" class="p-2 rounded-full bg-blue-600 text-white">
                                        <i class="bi bi-funnel-fill"></i>
                                    </button>

                                    <button type="button" id="clearFilterBtn"
                                        class="p-2 rounded-full bg-gray-200 text-gray-700">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                @endif

                <!-- ====== Profile Dropdown ====== -->
                <div class="relative">

                    <!-- BUTTON -->
                    <button id="dropdownButton"
                        class="flex items-center gap-2 hover:bg-gray-100 p-2 rounded transition">

                        <!-- BULAT SEMPURNA -->
                        <div
                            class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center font-semibold aspect-square">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>

                        <span class="hidden sm:inline text-gray-700 font-medium">
                            {{ Auth::user()->name }}
                        </span>

                        <i class="bi bi-chevron-down text-gray-600"></i>
                    </button>

                    <!-- MENU -->
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 top-full mt-2 w-60 bg-white rounded-md shadow-lg overflow-hidden z-50">

                        <div class="px-4 py-3 bg-gray-50 flex items-center gap-3">

                            <div
                                class="w-12 h-12 bg-blue-700 text-white rounded-full flex items-center justify-center text-lg font-semibold aspect-square">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ ucfirst(Auth::user()->role) }}</p>
                            </div>
                        </div>

                        <div class="px-4 py-3 text-sm text-gray-700 border-t">
                            <span class="block text-xs">{{ Auth::user()->email }}</span>
                        </div>

                        <ul class="py-1 text-sm border-t">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center px-4 py-2 hover:bg-gray-100 text-red-600 w-full text-left">
                                        <i class="bi bi-box-arrow-right mr-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- Spacer agar konten tidak ketutup header -->
    <div class="mt-20"></div>

    <!-- ====================== SCRIPT ====================== -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // ---------- FILTER ----------
            const filterBtn = document.getElementById("filterToggleBtn");
            const filterModal = document.getElementById("filterModal");
            const closeFilterModal = document.getElementById("closeFilterModal");
            const clearFilterBtn = document.getElementById("clearFilterBtn");

            if (filterBtn) {
                filterBtn.onclick = (e) => {
                    e.stopPropagation();
                    filterModal.classList.toggle("hidden");
                };
            }

            if (closeFilterModal) {
                closeFilterModal.onclick = () => filterModal.classList.add("hidden");
            }

            if (clearFilterBtn) {
                clearFilterBtn.onclick = () => {
                    const form = clearFilterBtn.closest("form");
                    form.reset();
                    form.submit();
                };
            }

            // ---------- DROPDOWN ----------
            const dropdownBtn = document.getElementById("dropdownButton");
            const dropdownMenu = document.getElementById("dropdownMenu");

            dropdownBtn.onclick = (e) => {
                e.stopPropagation();
                dropdownMenu.classList.toggle("hidden");
            };

            document.onclick = (e) => {
                if (!dropdownBtn.contains(e.target)) dropdownMenu.classList.add("hidden");
                if (!filterBtn?.contains(e.target) && !filterModal.contains(e.target)) filterModal.classList.add("hidden");
            };
        });
    </script>

</body>

</html>