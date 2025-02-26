@extends('components.layout')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

    @if(session('cart') && count(session('cart')) > 0)
    <form action="" method="">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($cart as $id => $item)
            <div class="bg-white shadow-md rounded-lg p-4 flex flex-col">
                <div class="flex items-center space-x-4">
                    <input type="checkbox" name="selected_items[]" value="{{ $id }}" class="w-5 h-5">
                    <img src="" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-md">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                        <p class="text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm text-gray-500">Size: {{ $item['size'] ?? '-' }}</span>
                    <span class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</span>
                </div>
                <div class="mt-4">
                    <button type="button" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">Hapus</button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8 flex justify-between items-center">
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
@endsection
