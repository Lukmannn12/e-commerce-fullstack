<nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/">
                    <img class="h-10 w-auto" src="" alt="Logo">
                </a>
            </div>

            <!-- Search Bar -->
            <div class="flex-grow mx-6">
                <div class="relative">
                    <input type="text" placeholder="Search products..." class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-600">
                        🔍
                    </button>
                </div>
            </div>

            <!-- Authentication & Cart -->
            <div class="flex items-center space-x-4">
    <a href="{{ route('cart.view') }}" class="text-blue-600 relative">
        🛒<span>{{ auth()->user() ? auth()->user()->carts()->count() : 0 }}</span>
    </a>

    @if(auth()->check())
        <a href="" class="text-gray-700 font-semibold">
            {{ auth()->user()->name }}
        </a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
    @endif
</div>

        </div>
    </div>
</nav>
