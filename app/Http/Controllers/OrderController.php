<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function orderNow(Request $request)
    {
        $getHargaProduct = Product::where('id', $request['id_product'])->first()->hargaproduct;

        $order = new Order();
        $order->id_product = $request['id_product'];
        $order->id_user = $request['id_user'];
        $order->tanggal = now(); // Assuming you want the current date
        $order->total_bayar = $request->quantity * $getHargaProduct; // You may calculate the total later // Set the initial status
        $order->save();

        return redirect('/katalog')->with('success', 'Pesanan berhasil ditambahkan');
    }
}
