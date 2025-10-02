<nav class="bg-white shadow-md px-6 py-2 flex items-center justify-between z-50 fixed top-0 left-0 right-0">
    {{-- Judul sesuai role --}}
    @if(Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
        <h2 class="!text-xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="bi bi-speedometer2"></i> Dashboard Admin
        </h2>
    @else
        <h1 class="!text-xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="bi bi-journal-check"></i> TugasKu
        </h1>
    @endif

    {{-- Area kanan --}}
    <div class="flex items-center space-x-3 relative">
        {{-- Tombol Tambah & Filter hanya untuk user --}}
        @if(Auth::user()->role === 'user')
            <a href="{{ route('tugas.create') }}"
               class="p-2 rounded-full hover:bg-gray-100 transition"
               title="Tambah Tugas">
                <i class="bi bi-plus-circle text-xl text-blue-600"></i>
            </a>

            <div class="relative">
                <!-- Tombol Filter -->
                <button id="filterToggleBtn"
                        class="p-2 rounded-full hover:bg-gray-100 transition"
                        title="Filter">
                    <i class="bi bi-funnel-fill text-xl text-gray-600"></i>
                </button>

                {{-- Modal Filter --}}
                <div id="filterModal" class="modal hidden">
                    <div class="modal-content">
                        <span class="close" id="closeFilterModal">&times;</span>
                        <h3>Filter Tugas</h3>
                        <form method="GET" action="{{ route('tugas.index') }}">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="">Semua</option>
                                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                                <option value="selesai" {{ request('status')=='selesai'?'selected':'' }}>Selesai</option>
                            </select>

                            <label>Prioritas</label>
                            <select name="priority" class="form-select">
                                <option value="">Semua</option>
                                <option value="rendah" {{ request('priority')=='rendah'?'selected':'' }}>Rendah</option>
                                <option value="sedang" {{ request('priority')=='sedang'?'selected':'' }}>Sedang</option>
                                <option value="tinggi" {{ request('priority')=='tinggi'?'selected':'' }}>Tinggi</option>
                            </select>

                            <label>Deadline sebelum</label>
                            <input type="date" name="deadline" class="form-control" value="{{ request('deadline') }}">

                            <label>Sort by</label>
                            <select name="sort" class="form-select">
                                <option value="deadline_asc" {{ request('sort')=='deadline_asc'?'selected':'' }}>Deadline Terdekat</option>
                                <option value="deadline_desc" {{ request('sort')=='deadline_desc'?'selected':'' }}>Deadline Terjauh</option>
                                <option value="priority_desc" {{ request('sort')=='priority_desc'?'selected':'' }}>Prioritas</option>
                                <option value="created_desc" {{ request('sort')=='created_desc'?'selected':'' }}>Terbaru</option>
                            </select>

                            <div class="flex justify-end gap-2 mt-2">
                                <!-- Terapkan Filter -->
                                <button type="submit" class="btn btn-primary p-2 rounded-full" title="Terapkan Filter">
                                    <i class="bi bi-funnel-fill text-white"></i>
                                </button>

                                <!-- Clear Filter -->
                                <button type="button" id="clearFilterBtn" class="btn btn-light p-2 rounded-full" title="Clear Filter">
                                    <i class="bi bi-x-lg text-gray-600"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        {{-- Dropdown Profile --}}
        <div class="relative">
            <button onclick="toggleDropdown()" id="dropdownButton"
                    class="flex items-center space-x-3 focus:outline-none hover:bg-gray-100 px-3 py-2 rounded transition">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=27548A&color=fff"
                     class="w-9 h-9 rounded-full object-cover" alt="User Photo">
                <span class="text-gray-700 font-medium hidden sm:inline">{{ Auth::user()->name ?? 'User' }}</span>
                <svg id="dropdownIcon" class="w-4 h-4 text-gray-600 transition-transform duration-200"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="dropdownMenu"
                 class="hidden absolute right-0 top-full mt-2 w-64 bg-white rounded-md shadow-xl z-50 overflow-hidden animate-fade">
                <div class="px-4 py-3 bg-gray-50">
                    <div class="flex items-center space-x-3">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=27548A&color=fff"
                             class="w-12 h-12 rounded-full object-cover" alt="User Photo">
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-xs text-gray-500">{{ ucfirst(Auth::user()->role ?? 'user') }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 text-sm text-gray-700 space-y-2 border-t border-gray-200">
                    <div class="flex items-center">
                        <i class="fas fa-envelope mr-2 w-4 text-gray-400"></i>
                        <span class="text-gray-600">Email:</span>
                        <span class="ml-auto font-medium text-xs">{{ Auth::user()->email ?? '-' }}</span>
                    </div>
                </div>

                <div class="border-t border-gray-200"></div>
                <ul class="py-1 text-sm">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 text-red-600 w-full text-left">
                                <i class="fas fa-sign-out-alt mr-2 w-4"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

{{-- Tambahkan margin top ke konten utama supaya tidak tertutup navbar --}}
<div class="mt-14">
    {{-- Konten halaman di sini --}}
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // --- Filter Modal ---
    const filterBtn = document.getElementById("filterToggleBtn");
    const filterModal = document.getElementById("filterModal");
    const closeFilterModal = document.getElementById("closeFilterModal");
    const clearFilterBtn = document.getElementById('clearFilterBtn');

    if (filterBtn && filterModal) {
        filterBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            filterModal.classList.toggle("hidden"); // toggle visibility
        });
    }

    if (closeFilterModal && filterModal) {
        closeFilterModal.addEventListener("click", () => {
            filterModal.classList.add("hidden"); // close modal
        });
    }

    if (clearFilterBtn) {
        clearFilterBtn.addEventListener('click', () => {
            const form = clearFilterBtn.closest('form');
            form.querySelectorAll('input, select').forEach(el => {
                if (el.tagName.toLowerCase() === 'select') el.selectedIndex = 0;
                else el.value = '';
            });
            form.submit(); // langsung reload halaman tanpa filter
        });
    }

    // --- Dropdown Profile ---
    const dropdownBtn = document.getElementById("dropdownButton");
    const dropdownMenu = document.getElementById("dropdownMenu");

    if (dropdownBtn && dropdownMenu) {
        dropdownBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle("hidden");
        });
    }

    // --- Klik luar untuk menutup ---
    document.addEventListener("click", function(event) {
        if (filterModal && !filterBtn.contains(event.target) && !filterModal.contains(event.target)) {
            filterModal.classList.add("hidden");
        }
        if (dropdownMenu && !dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
</script>
