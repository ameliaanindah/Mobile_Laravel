<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Validasi input form disini sesuai dengan kebutuhan Anda
        $request->validate([
            'nama_merk' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $merk = new Merk();
        $merk->nama_merk = $request->input('nama_merk');

        // Mengunggah gambar (foto merk)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('merkimg'), $imageName); // Ganti direktori tujuan
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

        return response()->json($merk, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $merk = Merk::find($id);

        // Validasi input form disini sesuai dengan kebutuhan Anda
        $request->validate([
            'nama_merk' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $merk->nama_merk = $request->input('nama_merk');

        // Mengunggah gambar (foto merk) jika dipilih
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('merkimg'), $imageName);

            // Hapus foto lama jika ada
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

        // Hapus gambar jika ada
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
        $product = DB::table('product')
            ->join('merk', 'product.id_merk', '=', 'merk.id')
            ->where('product.id_merk', $id_merk)
            ->select('product.*', 'merk.id as id_merk', 'merk.nama_merk')
            ->get();

        if ($product->isEmpty()) {
            return response()->json(['message' => 'No products found for this merk'], 404);
        }

        return response()->json($product, 200);
    }

    /**
 * Get all brands.
 */
public function getAll()
{
    $merk = Merk::all();

    if ($merk->isEmpty()) {
        return response()->json(['message' => 'No brands found'], 404);
    }

    return response()->json($merk, 200);
}

}
