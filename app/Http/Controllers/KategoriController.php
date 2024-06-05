<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return response()->json($kategori, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input form as per your requirements
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $data = [
            'nama_kategori' => $request->input('nama_kategori'),
        ];

        $id = DB::table('kategori')->insertGetId($data);

        $kategori = DB::table('kategori')->where('id', $id)->first();

        return response()->json($kategori, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();

        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }

        return response()->json($kategori, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $data = [
            'nama_kategori' => $request->input('nama_kategori'),
        ];

        $kategori = DB::table('kategori')->where('id', $id)->first();

        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }

        DB::table('kategori')->where('id', $id)->update($data);

        $updatedKategori = DB::table('kategori')->where('id', $id)->first();

        return response()->json($updatedKategori, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();

        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }

        DB::table('kategori')->where('id', $id)->delete();

        return response()->json(['message' => 'Kategori deleted'], 200);
    }

    /**
     * Get product by category ID.
     */
    public function getProductsByCategoryId($id_kategori = null)
    {
        if ($id_kategori) {
            $product = DB::table('product')
                ->join('kategori', 'product.id_kategori', '=', 'kategori.id')
                ->where('product.id_kategori', $id_kategori)
                ->select('product.*', 'kategori.id as id_kategori', 'kategori.nama_kategori')
                ->get();

            if ($product->isEmpty()) {
                return response()->json(['message' => 'No product found for this category'], 404);
            }
        } else {
            $product = DB::table('product')
                ->join('kategori', 'product.id_kategori', '=', 'kategori.id')
                ->select('product.*', 'kategori.id as id_kategori', 'kategori.nama_kategori')
                ->get();

            if ($product->isEmpty()) {
                return response()->json(['message' => 'No product found'], 404);
            }
        }

        return response()->json($product, 200);
    }

}
