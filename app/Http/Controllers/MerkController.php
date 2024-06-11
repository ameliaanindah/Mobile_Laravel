<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Merk;
use Illuminate\Support\Facades\Config;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merk = Merk::all();
        return response()->json($merk, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_merk' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $merk = new Merk();
        $merk->nama_merk = $request->input('nama_merk');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('merkimg'), $imageName);
            $merk->gambar = $imageName;
        }

        $merk->save();

        return response()->json($merk, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $merk = Merk::find($id);

        if (!$merk) {
            return response()->json(['message' => 'Merk not found'], 404);
        }

        // Base URL for images
        $baseImageUrl = url('merkimg');

        // Add image URL to response
        $merkWithImageUrl = [
            'id' => $merk->id,
            'nama_merk' => $merk->nama_merk,
            'gambar_url' => $baseImageUrl . '/' . $merk->gambar, // Combine base URL with image file name
        ];

        return response()->json($merkWithImageUrl, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $merk = Merk::find($id);

        $request->validate([
            'nama_merk' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $merk->nama_merk = $request->input('nama_merk');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('merkimg'), $imageName);

            if (!empty($merk->gambar)) {
                $fotoPath = public_path('merkimg/' . $merk->gambar);
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            $merk->gambar = $imageName;
        }

        $merk->save();

        return response()->json($merk, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $merk = Merk::find($id);

        if (!$merk) {
            return response()->json(['message' => 'Merk not found'], 404);
        }

        if (!empty($merk->gambar)) {
            $fotoPath = public_path('merkimg/' . $merk->gambar);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $merk->delete();

        return response()->json(['message' => 'Merk deleted']);
    }

    /**
     * Get products by merk ID.
     */
    public function getProductsByMerkId($id_merk)
    {
        // Base URL for images
        $baseImageUrl = url('produkimg');

        $product = DB::table('product')
            ->join('merk', 'product.id_merk', '=', 'merk.id')
            ->where('product.id_merk', $id_merk)
            ->select('product.*', 'merk.id as id_merk', 'merk.nama_merk', 'merk.gambar as merk_gambar')
            ->get();

        if ($product->isEmpty()) {
            return response()->json(['message' => 'No products found for this merk'], 404);
        }

        // Transform each product object to include image URL
        $productWithImageUrl = $product->map(function ($item) use ($baseImageUrl) {
            return [
                'id' => $item->id,
                'nama_product' => $item->nama_product,
                'harga' => $item->harga,
                'deskripsi' => $item->deskripsi,
                'id_merk' => $item->id_merk,
                'nama_merk' => $item->nama_merk,
                'gambar_url' => $baseImageUrl . '/' . $item->gambar, // Combine base URL with image file name
            ];
        });

        return response()->json($productWithImageUrl, 200);
    }


    /**
     * Get all brands.
     */
    public function getAllMerk()
    {
        // Base URL for images
        $baseImageUrl = url('merkimg');

        // Get all brands
        $merk = Merk::all();

        if ($merk->isEmpty()) {
            return response()->json(['message' => 'No brands found'], 404);
        }

        // Transform each brand object to include image URL
        $merkWithImageUrl = $merk->map(function ($item) use ($baseImageUrl) {
            return [
                'id' => $item->id,
                'nama_merk' => $item->nama_merk,
                'gambar_url' => $baseImageUrl . '/' . $item->gambar, // Combine base URL with image file name
            ];
        });

        return response()->json($merkWithImageUrl, 200);
    }
}
