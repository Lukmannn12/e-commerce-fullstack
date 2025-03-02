@extends('components.layout')

@section('title', 'Pembayaran Berhasil')

@section('content')
<div class="flex min-h-full flex-col justify-center text-center px-6 py-32 lg:px-8">
    <div class="flex justify-center">
        <svg class="w-24 h-24 text-green-500 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    
    <h2 class="text-2xl font-bold text-green-600 mt-4">Pembayaran Berhasil!</h2>
    <p class="text-gray-600">Terima kasih atas pembelian Anda. Pesanan Anda akan segera diproses.</p>
</div>
@endsection
