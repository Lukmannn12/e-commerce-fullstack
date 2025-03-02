@extends('components.layout')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

    @if($cart->count() > 0)
    <form action="" method="">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($cart as $id => $item)
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-row items-center">
                <!-- Gambar di kiri -->
                <img src="" alt="" class="w-24 h-24 object-cover rounded-md">

                <!-- Detail produk di kanan -->
                <div class="flex-1 ml-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">{{ $item->product->name ?? 'Produk tidak ditemukan' }}</h3>
                        <input type="checkbox" name="selected_items[]" value="{{ $item->subtotal }}" class="w-5 h-5 item-checkbox">
                    </div>
                    <p class="text-gray-600">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                    <span class="text-sm text-gray-500">Size: {{ $item->stock->size ?? '-' }}</span>
                    <div class="mt-2 flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Jumlah: {{ $item->quantity }}</span>
                    </div>
                    <p class="text-sm font-bold text-gray-800 mt-2">Subtotal: Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>

                    <div class="mt-4">
                        <button type="button" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">Hapus</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 text-right">
            <h3 class="text-lg font-semibold">Total Harga: Rp <span id="totalHarga">{{ number_format(0, 0, ',', '.') }}</span></h3>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <a href="" class="text-blue-600 hover:underline">Lanjut Belanja</a>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                Checkout Terpilih
            </button>
        </div>
    </form>

    @else
    <p class="text-gray-500">Keranjang belanja kosong.</p>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let checkboxes = document.querySelectorAll(".item-checkbox");
        let totalHargaElement = document.getElementById("totalHarga");

        function updateTotal() {
            let total = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    total += parseInt(checkbox.value);
                }
            });
            totalHargaElement.textContent = new Intl.NumberFormat('id-ID').format(total);
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", updateTotal);
        });

        // Set total harga awal (jika ada yang sudah dicentang)
        updateTotal();
    });
</script>
@endsection
