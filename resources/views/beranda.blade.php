@extends('components.layout')

@section('content')
@if(session('success'))
<div id="alert" class="mb-4 px-4 py-3 bg-green-500 text-white rounded-md shadow-md">
  <p>{{ session('success') }}</p>
</div>
@endif
<!-- hero section -->
<div class="flex justify-center items-center h-screen relative">
  <div class="mx-auto max-w-2xl text-center">
    <h1 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Data to enrich your online business</h1>
    <p class="mt-8 text-lg font-medium text-gray-500 sm:text-xl">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Get started</a>
      <a href="#" class="text-sm font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a>
    </div>
  </div>
</div>


<!-- Produk Section -->
<section id="produk" class="py-20">
  <div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($products as $product)
        <div x-data="{ showModal: false }" class="group relative border rounded-md p-4 shadow-sm hover:shadow-lg transition">
          <!-- Gambar Produk -->
          <img src=""
            alt="{{ $product->name }}"
            class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75">

          <!-- Informasi Produk -->
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">{{ $product->name }}</h3>
              <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
          </div>

          <!-- Button untuk menampilkan modal -->
          <button @click="showModal = true" class="mt-4 w-full bg-indigo-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-indigo-500 transition">
            Detail
          </button>

          <!-- Modal Detail Produk -->
          <div x-show="showModal" x-cloak class="fixed inset-0 z-10 w-screen overflow-y-auto bg-gray-500/75 flex items-center justify-center">
            <div class="relative bg-white py-10 px-6 w-full max-w-2xl rounded-lg shadow-lg">
              <button @click="showModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Close</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
              </button>

              <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                <img src=""
                  alt="{{ $product->name }}"
                  class="aspect-2/3 w-full rounded-lg bg-gray-100 sm:col-span-4">
                <div class="sm:col-span-8">
                  <h2 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h2>
                  <p class="text-2xl text-gray-900 mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                  <p class="mt-4 text-gray-600">{{ $product->description }}</p>

                  <!-- Pilihan Ukuran -->
                  <div x-data="{ selectedSize: '' }">
                    <fieldset class="mt-10" aria-label="Choose a size">
                      <div class="text-sm font-medium text-gray-900">Size</div>
                      <div class="text-sm text-gray-500">Stock: {{ $product->stocks->sum('quantity') }}</div>

                      <div class="mt-4 grid grid-cols-4 gap-4">
                        @foreach ($product->stocks as $stock)
                        <label
                          class="group relative flex cursor-pointer items-center justify-center rounded-md border px-4 py-3 text-sm font-medium uppercase shadow-xs"
                          :class="{ 'bg-blue-500 text-white': selectedSize === '{{ $stock->size }}' }"
                          @click="selectedSize = '{{ $stock->size }}'">
                          <input type="radio" name="size-choice" value="{{ $stock->size }}" class="sr-only">
                          <span>{{ $stock->size }}</span>
                        </label>
                        @endforeach
                      </div>
                    </fieldset>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="size" x-model="selectedSize"> <!-- Pastikan ini -->
    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition"
        :disabled="!selectedSize">
        Tambahkan ke Keranjang
    </button>
</form>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<script>
  setTimeout(() => {
    let alertBox = document.getElementById('alert');
    if (alertBox) {
      alertBox.style.display = 'none';
    }
  }, 3000); // Alert akan hilang setelah 3 detik
</script>

@endsection