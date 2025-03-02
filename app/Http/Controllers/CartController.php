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
        // Validasi apakah stock_id dikirim
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
        ]);
    
        // Ambil stock berdasarkan ID
        $stock = Stock::find($request->stock_id);
    
        if (!$stock || $stock->product_id != $productId) {
            return back()->with('error', 'Stok tidak valid.');
        }
    
        // Ambil ID user yang sedang login
        $userId = Auth::id();
    
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        // Cek apakah item sudah ada di keranjang dengan stock_id yang sama
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('stock_id', $stock->id)
            ->first();
    
        if ($cartItem) {
            $cartItem->increment('quantity'); // Tambah jumlah jika sudah ada
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'stock_id' => $stock->id, // Simpan stock_id
                'quantity' => 1,
            ]);
        }
    
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
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
        
        return view('cart.index', compact('cart'));
    }
    
    
    
}
