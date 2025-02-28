<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = auth()->user();
    
        // Validasi apakah stock_id dikirim
        $request->validate([
            'stock_id' => 'required|exists:stocks,id',
        ]);
    
        // Ambil stock berdasarkan ID
        $stock = Stock::find($request->stock_id);
    
        if (!$stock || $stock->product_id != $productId) {
            return back()->with('error', 'Stok tidak valid.');
        }
    
        // Cek apakah item sudah ada di keranjang dengan stock_id yang sama
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->where('stock_id', $stock->id)
            ->first();
    
        if ($cartItem) {
            $cartItem->increment('quantity'); // Tambah jumlah jika sudah ada
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'stock_id' => $stock->id, // Simpan stock_id
                'quantity' => 1,
            ]);
        }
    
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
    

    public function viewCart()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        $cart = Cart::where('user_id', $user->id)->with('product', 'stock')->get();
        
        return view('cart.index', compact('cart'));
    }
    
    
    
}
