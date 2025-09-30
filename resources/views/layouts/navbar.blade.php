
<nav class="bg-white shadow-md px-6 py-4 flex items-center justify-between sticky top-0 z-40 mt-16 sm:mt-16 md:mt-0 lg:mt-0">
    <h2 class="text-xl font-semibold text-gray-800">Dashboard Admin</h2>
    
    <div class="relative">
        <button onclick="toggleDropdown()" id="dropdownButton" class="flex items-center space-x-3 focus:outline-none hover:bg-gray-100 px-3 py-2 rounded transition">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=27548A&color=fff"
                 class="w-9 h-9 rounded-full" alt="User Photo">
            <span class="text-gray-700 font-medium hidden sm:inline">{{ Auth::user()->name ?? 'Admin' }}</span>
            <svg id="dropdownIcon" class="w-4 h-4 text-gray-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-md shadow-xl z-50 overflow-hidden animate-fade">
            <!-- User Info Section -->
            <div class="px-4 py-3 bg-gray-50">
                <div class="flex items-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=27548A&color=fff"
                         class="w-12 h-12 rounded-full" alt="User Photo">
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-900">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->role ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- User Details -->
            <div class="px-4 py-3 text-sm text-gray-700 space-y-2 border-t border-gray-200">
                <div class="flex items-center">
                    <i class="fas fa-envelope mr-2 w-4 text-gray-400"></i>
                    <span class="text-gray-600">Email:</span>
                    <span class="ml-auto font-medium text-xs">{{ Auth::user()->email ?? '-' }}</span>
                </div>
            </div>
            
            <!-- Menu Actions -->
            <div class="border-t border-gray-200"></div>
            <ul class="py-1 text-sm">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-2 hover:bg-gray-100 text-red-600 w-full text-left">
                            <i class="fas fa-sign-out-alt mr-2 w-4"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* CSS sama kayak versi native */
@keyframes fadeIn { from {opacity:0;transform:translateY(-10px);} to {opacity:1;transform:translateY(0);} }
.animate-fade { animation: fadeIn 0.2s ease-out; }
#dropdownMenu { box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
#dropdownButton:hover { background-color: #f3f4f6; }
#dropdownIcon { transition: transform 0.2s ease; }
#dropdownIcon.rotate-180 { transform: rotate(180deg); }
</style>

<script>
function toggleDropdown() {
    const menu = document.getElementById('dropdownMenu');
    const icon = document.getElementById('dropdownIcon');
    menu.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}
document.addEventListener('click', function(event) {
    const button = document.getElementById('dropdownButton');
    const dropdown = document.getElementById('dropdownMenu');
    const icon = document.getElementById('dropdownIcon');
    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
});
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const dropdown = document.getElementById('dropdownMenu');
        const icon = document.getElementById('dropdownIcon');
        dropdown.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
});
</script>