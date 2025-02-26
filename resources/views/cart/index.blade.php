@extends('components.layout')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left p-2">Produk</th>
                        <th class="text-left p-2">Harga</th>
                        <th class="text-left p-2">Jumlah</th>
                        <th class="text-left p-2">Size</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cart as $id => $item)
<tr class="border-t">
    <td class="p-2 flex items-center">
        {{ $item['name'] }}
    </td>
    <td class="p-2">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
    <td class="p-2">{{ $item['quantity'] }}</td>
    <td class="p-2">
        {{ isset($item['size']) ? $item['size'] : '-' }} <!-- Cek apakah size ada -->
    </td>
</tr>
@endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500">Keranjang belanja kosong.</p>
    @endif
</div>
@endsection
