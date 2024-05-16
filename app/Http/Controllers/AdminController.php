<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }
    public function addCategory(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Simpan data kategori baru ke dalam database
        Category::create([
            'category_name' => $request->category_name,
        ]);

        // Redirect pengguna ke halaman yang sesuai, misalnya halaman dashboard admin
        return redirect()->route('admin.category')->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function deleteCategory($id)
    {
        // Cari kategori berdasarkan ID
        $category = Category::find($id);

        // Jika kategori tidak ditemukan
        if (!$category) {
            return redirect()->route('admin.dashboard')->with('error', 'Kategori tidak ditemukan.');
        }

        // Hapus kategori
        $category->delete();

        // Redirect pengguna ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('admin.category')->with('success', 'Kategori berhasil dihapus.');
    }


    public function product()
    {
        $category = Category::all();
        $product = Product::all();
        return view('admin.product', compact('product', 'category'));
    }
    public function addProduct(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'product_title' => 'required|string|max:255',
            'product_desc' => 'nullable|string',
            'product_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Simpan gambar produk ke dalam penyimpanan
        $imagePath = $request->file('product_image')->store('public/product_images');

        // Ambil hanya nama file dari path penyimpanan
        $imageName = basename($imagePath);

        // Simpan data produk ke dalam database
        Product::create([
            'product_image' => $imageName,
            'product_title' => $request->product_title,
            'product_desc' => $request->product_desc,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
        ]);

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function updateProduct(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'product_title' => 'required|string|max:255',
            'product_desc' => 'nullable|string',
            'product_price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Cari data produk yang akan diperbarui berdasarkan ID
        $product = Product::findOrFail($request->id);

        // Update data produk yang ada
        $product->product_title = $request->product_title;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;

        // Jika ada gambar baru yang diunggah, simpan gambar baru
        if ($request->hasFile('product_image')) {
            // Validasi dan simpan gambar baru ke dalam penyimpanan
            $request->validate([
                'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            ]);
            $imagePath = $request->file('product_image')->store('public/product_images');
            // Ambil hanya nama file dari path penyimpanan
            $imageName = basename($imagePath);
            // Hapus gambar lama dari penyimpanan
            Storage::delete('public/product_images/' . $product->product_image);
            // Simpan nama file gambar yang baru ke dalam database
            $product->product_image = $imageName;
        }

        // Simpan perubahan ke dalam database
        $product->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Produk berhasil diperbarui.');
    }


    public function deleteProduct($id)
    {
        // Cari data produk yang akan dihapus berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus gambar produk dari penyimpanan
        Storage::delete('public/product_images/' . $product->product_image);

        // Hapus data produk dari database
        $product->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Produk berhasil dihapus.');
    }

    public function order()
    {
        $order = Order::latest()->get();
        return view('admin.order', compact('order'));
    }
    public function detailOrder($kodePesanan)
    {
        $order = OrderProduct::where('kode_pesanan', $kodePesanan)->get();
        $totalPrice = OrderProduct::where('kode_pesanan', $kodePesanan)->sum('price');
        $orders = Order::where('kode_pesanan', $kodePesanan)->first();

        return view('admin.detailOrder', compact('order', 'totalPrice', 'kodePesanan', 'orders'));
    }
    public function downloadPaymentProof($payment_proof)
    {
        // Mendapatkan path lengkap dari bukti pembayaran
        $filePath = storage_path('app/public/payment_proof/' . $payment_proof);

        // Memeriksa apakah file ada
        if (Storage::disk('public')->exists('payment_proof/' . $payment_proof) && file_exists($filePath)) {
            // Mengirimkan file untuk diunduh
            return response()->download($filePath, null, [], null);
        } else {
            // Jika file tidak ditemukan, arahkan kembali dengan pesan error
            return redirect()->back()->with('error', 'Bukti pembayaran tidak ditemukan.');
        }
    }

    public function confirmOrder($kode_pesanan)
    {
        // Temukan pesanan berdasarkan kode pesanan
        $order = Order::where('kode_pesanan', $kode_pesanan)->first();

        // Periksa apakah pesanan ditemukan
        if ($order) {
            // Lakukan tindakan konfirmasi pesanan di sini, misalnya mengubah status_order menjadi 'confirmed'
            $order->status_order = 'Confirmed By Admin';
            $order->save();

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Pesanan berhasil dikonfirmasi.');
        } else {
            // Jika pesanan tidak ditemukan, kembalikan dengan pesan error
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    }
}
