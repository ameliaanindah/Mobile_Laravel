<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $product = Product::with(['kategori', 'product'])->get();
        return response()->json($product, 200);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // $request->input('nama_product');validate([
        //     'nama_product' => 'required|string|max:255',
        //     'deskripsi' => 'nullable|string',
        //     'harga' => 'required|numeric',
        //     'id_kategori' => 'required|exists:kategori,id',
        //     'id_produk' => 'required|exists:produk,id',
        // ]);

        $product = new Product();
        $product->id_kategori = $request->input('id_kategori');
        $product->id_merk = $request->input('id_merk');
        $product->nama_product = $request->input('nama_product');
        $product->deskripsi = $request->input('deskripsi');
        $product->harga = $request->input('harga');

         // Mengunggah gambar (foto pekerja)
         if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('produkimg'), $imageName); // Ganti direktori tujuan
            $product->gambar = $imageName;
        }
        $product->save();

        return response()->json($product, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $product = Product::with(['kategori', 'produk'])->find($id);

        if (is_null($product)) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product, 200);
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $produk = Product::find($id);
        $product = new Product();
        $product->id_kategori = $request->input('id_kategori');
        $product->id_merk = $request->input('id_merk');
        $product->nama_product = $request->input('nama_product');
        $product->deskripsi = $request->input('deskripsi');
        $product->harga = $request->input('harga');
        $product->save();


        // Mengunggah gambar (foto artikel) jika dipilih
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('produkimg'), $imageName);

            // Hapus foto lama jika ada
            if (!empty($produk->gambar)) {
                $fotoPath = public_path('produkimg/' . $produk->gambar);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                } else {
                    return redirect()->back()->with('error', 'File foto produk tidak ditemukan');
                }
            }

            $produk->gambar = $imageName;
        }

        $produk->save();

        return response()->json($produk, 200);
    }
    // Remove the specified resource from storage
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
