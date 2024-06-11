<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $product = DB::table('product')
            ->join('kategori', 'product.id_kategori', '=', 'kategori.id')
            ->select('product.*', 'kategori.nama_kategori')
            ->get();

        return response()->json($product, 200);
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|exists:kategori,id',
            'id_merk' => 'required|exists:merk,id',
        ]);

        // Mengunggah gambar
        $imageName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('produkimg'), $imageName);
        }

        // Buat produk baru
        $productId = DB::table('product')->insertGetId([
            'id_kategori' => $request->input('id_kategori'),
            'id_merk' => $request->input('id_merk'),
            'nama_product' => $request->input('nama_product'),
            'deskripsi' => $request->input('deskripsi'),
            'harga' => $request->input('harga'),
            'gambar' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $product = DB::table('product')->where('id', $productId)->first();

        return response()->json($product, 201);
    }

    // Display the specified resource
    public function show($id)
    {
        $product = DB::table('product')
            ->join('kategori', 'product.id_kategori', '=', 'kategori.id')
            ->select('product.*', 'kategori.nama_kategori')
            ->where('product.id', $id)
            ->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Base URL for images
        $baseImageUrl = url('produkimg');

        // Add image URL to response
        $productWithImageUrl = [
            'id' => $product->id,
            'nama_product' => $product->nama_product,
            'harga' => $product->harga,
            'deskripsi' => $product->deskripsi,
            'gambar_url' => $baseImageUrl . '/' . $product->gambar, // Combine base URL with image file name
            'nama_kategori' => $product->nama_kategori,
        ];

        return response()->json($productWithImageUrl, 200);
    }


    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $product = DB::table('product')->where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validasi input data
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'id_kategori' => 'required|exists:kategori,id',
            'id_merk' => 'required|exists:merk,id',
        ]);

        // Mengunggah gambar jika ada
        $imageName = $product->gambar;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('produkimg'), $imageName);

            // Hapus gambar lama jika ada
            if (!empty($product->gambar) && file_exists(public_path('produkimg/' . $product->gambar))) {
                unlink(public_path('produkimg/' . $product->gambar));
            }
        }

        // Update produk
        DB::table('product')
            ->where('id', $id)
            ->update([
                'id_kategori' => $request->input('id_kategori'),
                'id_merk' => $request->input('id_merk'),
                'nama_product' => $request->input('nama_product'),
                'deskripsi' => $request->input('deskripsi'),
                'harga' => $request->input('harga'),
                'gambar' => $imageName,
                'updated_at' => now(),
            ]);

        $updatedProduct = DB::table('product')->where('id', $id)->first();

        return response()->json($updatedProduct, 200);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $product = DB::table('product')->where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Hapus gambar jika ada
        if (!empty($product->gambar) && file_exists(public_path('produkimg/' . $product->gambar))) {
            unlink(public_path('produkimg/' . $product->gambar));
        }

        DB::table('product')->where('id', $id)->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
