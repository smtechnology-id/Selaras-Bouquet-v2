<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('index');
    }
    public function login() {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika berhasil login, arahkan pengguna sesuai level
            if (Auth::user()->level === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('cart');
            }
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }

    public function product(){
        $category = Category::all();
        $product = Product::all();
        return view('product', compact('category', 'product'));

    }

    public function productDetail($id) {
        $product = Product::where('id', $id)->first();
        return view('productDetail', compact('product'));
    }
    public function team() {
        return view('team');
    }
    public function address() {
        return view('address');
    }

}
