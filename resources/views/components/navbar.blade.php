<nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/">
                    <img class="h-8 w-auto" src="" alt="Logo">
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Services</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Contact</a>
            </div>

            <!-- Keranjang & Profil -->
            <div class="flex items-center">
                <a href="{{ route('cart.view') }}" class="text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                    🛒({{ session('cart') ? count(session('cart')) : 0 }})
                </a>
                <img class="hidden md:inline-block size-10 rounded-full border-2 border-white" 
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <!-- Tombol Mobile Menu -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg id="menu-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="menu-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="menu-x" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="md:hidden hidden absolute top-16 left-0 w-full bg-white shadow-lg transition-transform duration-300 transform -translate-y-5 opacity-0">
        <div class="px-4 py-4 space-y-2">
            <a href="#" class="block text-gray-700 hover:text-blue-600 px-4 py-2 text-base font-medium">Home</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600 px-4 py-2 text-base font-medium">About</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600 px-4 py-2 text-base font-medium">Services</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600 px-4 py-2 text-base font-medium">Contact</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        var mobileMenu = document.getElementById('mobile-menu');
        var menuBars = document.getElementById('menu-bars');
        var menuX = document.getElementById('menu-x');
        
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
                mobileMenu.classList.remove('-translate-y-5', 'opacity-0');
            }, 10);
            menuBars.classList.add('hidden');
            menuX.classList.remove('hidden');
        } else {
            mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            mobileMenu.classList.add('-translate-y-5', 'opacity-0');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
            menuBars.classList.remove('hidden');
            menuX.classList.add('hidden');
        }
    });
</script>
