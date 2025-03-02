<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
    
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang belanja kosong.');
        }
    
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    
        $transactionDetails = [];
        $totalHarga = 0;
    
        foreach ($cartItems as $cart) {
            $transactionDetails[] = [
                'id' => $cart->id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'name' => $cart->product->name,
            ];
            $totalHarga += $cart->product->price * $cart->quantity;
        }
    
        // Data transaksi Midtrans
        $transaction = [
            'transaction_details' => [
                'order_id' => 'INV-' . uniqid(),
                'gross_amount' => $totalHarga,
            ],
            'item_details' => $transactionDetails,
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'callbacks' => [
                'finish' => route('payment.success')
            ]
        ];
    
        try {
            $snapToken = Snap::getSnapToken($transaction);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function paymentSuccess(Request $request)
    {
        $user = Auth::user();
        
        // Hapus semua item di keranjang setelah pembayaran berhasil
        Cart::where('user_id', $user->id)->delete();
    
        return view('payment.success');
    }
    
}
