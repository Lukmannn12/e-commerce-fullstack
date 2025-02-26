<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
    
        // Ambil size dari request
        $size = $request->input('size');
    
        if (!$size) {
            return redirect()->back()->with('error', 'Silakan pilih ukuran sebelum menambahkan ke keranjang.');
        }
    
        // Buat key yang unik berdasarkan ID produk dan ukuran
        $key = $id . '_' . $size;
    
        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                "name" => $product->name,
                "price" => $product->price,
                "size" => $size, // Simpan ukuran yang dipilih
                "quantity" => 1,
            ];
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
