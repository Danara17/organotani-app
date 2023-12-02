<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function storeProduct(Request $request)
    {

        $request->validate([
            'namaproduct' => 'required',
            'deskripsiproduct' => 'required',
            'hargaproduct' => 'required',
            'stockproduct' => 'required',
            'gambarproduct' => 'required|image',
        ]);

        $product = new Product;
        $product->namaproduct = $request->input('namaproduct');
        $product->deskripsiproduct = $request->input('deskripsiproduct');
        $product->hargaproduct = $request->input('hargaproduct');
        $product->stockproduct = $request->input('stockproduct');

        if ($request->hasFile('gambarproduct')) {
            $image = $request->file('gambarproduct');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);
            $product->gambarproduct = $imageName;
        }

        $product->save();

        return redirect()->route('readproduct')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);

        $request->validate([
            'namaproduct' => 'required',
            'deskripsiproduct' => 'required',
            'hargaproduct' => 'required',
            'stockproduct' => 'required',
            'gambarproduct' => 'required|image',
        ]);

        $product->namaproduct = $request->input('namaproduct');
        $product->deskripsiproduct = $request->input('deskripsiproduct');
        $product->hargaproduct = $request->input('hargaproduct');
        $product->stockproduct = $request->input('stockproduct');

        if ($request->hasFile('gambarproduct')) {


            $image = $request->file('gambarproduct');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);

            // Hapus gambar lama jika ada
            if ($product->gambarproduct) {
                unlink(public_path('product/' . $product->gambarproduct));
            }

            $product->gambarproduct = $imageName;
        }

        $product->save();

        return redirect()->route('readproduct')->with('success', 'Produk berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $product = Product::find($id);

        // Hapus gambar produk
        if ($product->gambarproduct) {
            unlink(public_path('product/' . $product->gambarproduct));
        }

        $product->delete();

        return redirect()->route('readproduct')->with('success', 'Produk berhasil dihapus.');
    }

}