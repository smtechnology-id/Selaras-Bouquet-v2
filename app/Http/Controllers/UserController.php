<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cart()
    {
        $user_id = Auth::user()->id;
        $cart = CartItem::where('user_id', $user_id)->get();
        $totalPrice = CartItem::where('user_id', $user_id)->sum('price');
        return view('user.cart', compact('cart', 'totalPrice'));
    }
    public function addToCart(Request $request)
    {
        if (Auth::user()) {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]);
            $user_id = Auth::user()->id;
            // Temukan prod uk yang ditambahkan ke keranjang
            $product = Product::findOrFail($request->product_id);

            $price = $product->product_price * $request->quantity;
            // Cek apakah item sudah ada di keranjang pengguna, jika ada tambahkan jumlahnya
            $cartItem = CartItem::where('product_id', $product->id)->first();
            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $request->quantity,
                ]);
            } else {
                // Jika tidak ada, tambahkan item baru ke keranjang pengguna
                CartItem::create([
                    'user_id' => $user_id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'price' => $price,
                ]);
            }

            // Redirect kembali ke halaman produk atau halaman keranjang
            return redirect()->route('cart')->with('success', 'Product added to cart successfully.');
        }
        return redirect()->route('login')->with('error', 'Silahkan Login dahulu');
    }

    public function minQtyCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        // Temukan item keranjang berdasarkan ID
        $cart = CartItem::findOrFail($request->id);

        // Periksa apakah quantity sudah satu
        if ($cart->quantity <= 1) {
            return redirect()->back()->with('error', 'Minimum quantity is 1.');
        }

        // Kurangi quantity item keranjang
        $newQuantity = $cart->quantity - 1;
        $productPrice = $cart->product->product_price;
        $newPrice = $productPrice * $newQuantity;
        $cart->update([
            'quantity' => $newQuantity,
            'price' => $newPrice,
        ]);

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Quantity updated successfully.');
    }

    public function addQtyCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        // Temukan item keranjang berdasarkan ID
        $cart = CartItem::findOrFail($request->id);

        // Kurangi quantity item keranjang
        $newQuantity = $cart->quantity + 1;
        $productPrice = $cart->product->product_price;
        $newPrice = $productPrice * $newQuantity;
        $cart->update([
            'quantity' => $newQuantity,
            'price' => $newPrice,
        ]);
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Quantity updated successfully.');
    }
    public function deleteCart($id)
    {
        // Cari item keranjang berdasarkan ID
        $cartItem = CartItem::find($id);

        // Periksa apakah item keranjang ditemukan
        if ($cartItem) {
            // Hapus item keranjang
            $cartItem->delete();
            // Redirect ke halaman sebelumnya atau halaman lain jika diperlukan
            return redirect()->back()->with('success', 'Cart item deleted successfully.');
        } else {
            // Redirect dengan pesan kesalahan jika item keranjang tidak ditemukan
            return redirect()->back()->with('error', 'Failed to delete cart item. Item not found.');
        }
    }

    public function prosesCheckout()
    {
        // Ambil semua item keranjang pengguna
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $kodePesanan = uniqid();
        // Proses semua item keranjang dan masukkan ke dalam tabel order_product
        foreach ($cartItems as $cartItem) {
            OrderProduct::create([
                'user_id' => Auth::id(),
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'kode_pesanan' => $kodePesanan,
                'price' => $cartItem->product->product_price, // Menggunakan harga produk dari item keranjang
            ]);
            // Hapus item keranjang setelah diproses
            $cartItem->delete();
        }

        // Redirect ke halaman lain setelah proses checkout
        return redirect()->route('order', ['kodePesanan' => $kodePesanan])->with('success', 'Checkout berhasil.');
    }

    public function order($kodePesanan)
    {
        $user_id = Auth::user()->id;
        $order = OrderProduct::where('kode_pesanan', $kodePesanan)->get();
        $totalPrice = OrderProduct::where('user_id', $user_id)->sum('price');

        return view('user.order', compact('order', 'totalPrice', 'kodePesanan'));
    }

    public function deleteOrderProduct($id)
    {
        // Cari produk pesanan berdasarkan ID
        $orderProduct = OrderProduct::find($id);

        // Periksa apakah produk pesanan ditemukan
        if ($orderProduct) {
            // Hapus produk pesanan
            $orderProduct->delete();
            // Redirect ke halaman sebelumnya atau halaman lain jika diperlukan
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            // Redirect dengan pesan kesalahan jika produk pesanan tidak ditemukan
            return redirect()->back()->with('error', 'Failed to delete product. Product not found.');
        }
    }

    public function orderPost(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'kode_pesanan' => 'required',
            'total_price' => 'required',
            'address' => 'required|string',
            'telp' => 'required|string',
            'payment_proof' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional: Buat validation jika ingin memvalidasi upload gambar
        ]);


        // Mendapatkan ID user yang sedang login
        $userId = Auth::user()->id;

        // Simpan pesanan ke dalam tabel orders
        $order = new Order();
        $order->user_id = $userId;
        $order->kode_pesanan = $request->kode_pesanan; // Generate kode pesanan secara acak
        $order->total_price = $request->total_price;
        $order->address = $request->address;
        $order->telp = $request->telp;
        $order->status_order = 'Paid From User';
        // Simpan gambar produk ke dalam penyimpanan
        $imagePath = $request->file('payment_proof')->store('public/payment_proof');
        
        // Ambil hanya nama file dari path penyimpanan
        $imageName = basename($imagePath);
        $order->payment_proof = $imageName;
 
        $order->save();
        return redirect()->route('orders')->with('success', 'Pesanan berhasil diproses. Terima kasih atas pesanannya!');
    }

    public function orders()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('user.orders', compact('orders'));
    }

    public function detailOrder($kodePesanan) {
        $user_id = Auth::user()->id;
        $order = OrderProduct::where('kode_pesanan', $kodePesanan)->get();
        $totalPrice = OrderProduct::where('kode_pesanan', $kodePesanan)->sum('price');
        $orders = Order::where('kode_pesanan', $kodePesanan)->first();

        return view('admin.detailOrder', compact('order', 'totalPrice', 'kodePesanan', 'orders'));
    }
}
