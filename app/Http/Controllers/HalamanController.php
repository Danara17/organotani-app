<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;


class HalamanController extends Controller
{
    //Halaman Landing Page
    public function showLandingPage()
    {
        return view('landingpage');
    }

    public function showLogin()
    {
        if (auth()->check()) {
            // Pengguna sudah login, arahkan ke dashboard atau rute lain yang sesuai
            return redirect()->route('showlandingpage');
        }
        return view('login');
    }

    public function showDashboard()
    {

        return view('dashboard.dashboard', [
            'jumlahproduct' => Product::count(),
            'jumlahuser' => User::count(),
        ]);
    }

    public function showMyAccount()
    {

        return view('myaccount');
    }

    public function showReadProduct()
    {
        return view('dashboard.product.produk', [
            'product' => Product::all(),
        ]);
    }
    public function showCreateProduct()
    {
        return view('dashboard.product.addproduct');
    }

    public function showEditProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('dashboard.product.editproduct', compact('product'));
    }


    public function showKatalog()
    {
        $product = Product::all();
        return view('katalog', compact('product'));
    }

    public function showDetailed($id)
    {
        $product = Product::where('id', $id)->first();
        $namaproduct = Product::where('id', $id)->first()->namaproduct;
        return view('detailedproduct', [
            'product' => $product,
            'title' => $namaproduct
        ]);
    }

    public function showUser()
    {
        $user = User::all();
        return view('dashboard.user.user', compact('user'));
    }

    public function myOrder()
    {
        $orders = Order::where('id_user', auth()->user()->id)
            ->with('product', 'user')
            ->get();

        return view('myorder', compact('orders'));
    }

    public function invoice($id)
    {

        $orders = Order::where('id', $id)
            ->with('product', 'user')
            ->first();

        return view('invoice', compact('orders'));
    }

    public function showHomepage()
    {
        return view('beranda');
    }

}