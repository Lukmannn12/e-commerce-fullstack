<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Validasi input
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Ambil stock berdasarkan ID
        $stock = Stock::find($request->stock_id);
    
        if (!$stock || $stock->product_id != $productId) {
            return back()->with('error', 'Stok tidak valid.');
        }
    
        // Pastikan jumlah yang dimasukkan tidak melebihi stok yang tersedia
        if ($request->quantity > $stock->quantity) {
            return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }
    
        // Ambil ID user yang sedang login
        $userId = Auth::id();
    
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        DB::beginTransaction();
        try {
            // Cek apakah item sudah ada di keranjang dengan stock_id yang sama
            $cartItem = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->where('stock_id', $stock->id)
                ->first();
    
            if ($cartItem) {
                // Update jumlah, tetapi tidak boleh melebihi stok yang tersedia
                $newQuantity = $cartItem->quantity + $request->quantity;
                if ($newQuantity > $stock->quantity) {
                    return back()->with('error', 'Total jumlah dalam keranjang melebihi stok yang tersedia.');
                }
                $cartItem->increment('quantity', $request->quantity);
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'stock_id' => $stock->id,
                    'quantity' => $request->quantity,
                ]);
            }
    
            // Kurangi stok setelah produk berhasil ditambahkan ke keranjang
            $stock->decrement('quantity', $request->quantity);
    
            DB::commit();
            return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }
    
    
    

    public function viewCart()
    {
        // Ambil ID user yang sedang login
        $userId = Auth::id();
    
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        // Ambil data keranjang berdasarkan user_id
        $cart = Cart::where('user_id', $userId)->with('product', 'stock')->get();
        
    
        // Hitung subtotal setiap item dan total harga keseluruhan
        $cart->each(function ($item) {
            $item->subtotal = $item->quantity * ($item->product->price ?? 0);
        });
            
        $totalHarga = $cart->sum('subtotal'); // Hitung total harga
    
        return view('cart.index', compact('cart', 'totalHarga'));
    }
    
    
    
    
}
