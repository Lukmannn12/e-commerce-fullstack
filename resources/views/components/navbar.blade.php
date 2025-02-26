<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/">
                    <img class="h-8 w-auto" src="" alt="Logo">
                </a>
            </div>

            <!-- Menu untuk desktop -->
            <div class="hidden md:flex space-x-4 items-center">
                <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Services</a>
                <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
            </div>

            <!-- Ikon profil dan menu mobile -->
            <div class="flex items-center">
                <!-- Ikon profil -->
                <div class="flex -space-x-2 overflow-hidden">
                    <img class="inline-block size-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>

                <!-- Tombol menu mobile -->
                <div class="md:hidden flex items-center ml-4">
                    <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Open main menu</span>
                        <!-- Ikon menu -->
                        <svg id="menu-icon" class="h-6 w-6 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menu-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path id="menu-x" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <a href="{{ route('cart.view') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                    🛒 Keranjang ({{ session('cart') ? count(session('cart')) : 0 }})
                </a>
            </div>
        </div>
    </div>

    <!-- Menu mobile dengan animasi -->
    <div id="mobile-menu" class="md:hidden hidden absolute top-16 left-0 w-full bg-white shadow-lg transition-all duration-300 transform -translate-y-5 opacity-0">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="#" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">About</a>
            <a href="#" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">Services</a>
            <a href="#" class="block text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium">Contact</a>
        </div>
    </div>
</nav>

<script>
    // Toggle menu dengan animasi smooth & ikon berubah jadi "X"
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        var menuBars = document.getElementById('menu-bars');
        var menuX = document.getElementById('menu-x');

        if (mobileMenu.classList.contains('hidden')) {
            // Buka menu
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
                mobileMenu.classList.remove('-translate-y-5', 'opacity-0');
            }, 10);
            // Ubah ikon ke "X"
            menuBars.classList.add('hidden');
            menuX.classList.remove('hidden');
        } else {
            // Tutup menu
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            mobileMenu.classList.add('-translate-y-5', 'opacity-0');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
            // Kembalikan ikon menu bar
            menuBars.classList.remove('hidden');
            menuX.classList.add('hidden');
        }
    });
</script>
