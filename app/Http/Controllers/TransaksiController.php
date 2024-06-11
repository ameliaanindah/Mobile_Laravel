<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkout(Request $request)
    {
        try {
            // // Ambil id_users dari pengguna yang sedang login
            $id_users = Auth::id();

            //tes disini 

            // if (!$id_users) {
            //     return response()->json(['message' => 'Unauthorized'], 401);
            // }
    // Debugging dengan echo
            echo "id_users: " . $id_users . "\n";
            echo "id_product: " . $request->id_product . "\n";
            echo "jumlah_product: " . $request->jumlah_product . "\n";
            echo "total_harga: " . $request->total_harga . "\n";

            // Validasi input
            $request->validate([
                'id_users' => 'required|exists:users,id',
                'id_product' => 'required|exists:product,id',
                'jumlah_product' => 'required|integer|min:1',
                'total_harga' => 'required|numeric|min:0'
            ]);

            // Hitung total harga
            $product = DB::table('product')->where('id', $request->input('id_product'))->first();
            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            $calculated_total_harga = $product->harga * $request->input('jumlah_product');

            // Pastikan total_harga sesuai dengan perhitungan
            if ($request->input('total_harga') != $calculated_total_harga) {
                return response()->json(['message' => 'Total harga tidak sesuai'], 400);
            }

            // Buat transaksi
            $transaksiId = DB::table('transaksi')->insertGetId([
                'id_users' => $id_users,
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Buat detail transaksi
            DB::table('detail_transaksi')->insert([
                'id_transaksi' => $transaksiId,
                'id_product' => $request->input('id_product'),
                'jumlah_product' => $request->input('jumlah_product'),
                'total_harga' => $calculated_total_harga,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Menggabungkan data transaksi dan detail_transaksi
            $transaksi = DB::table('transaksi')
                ->join('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.id_transaksi')
                ->where('transaksi.id', $transaksiId)
                ->select('transaksi.*', 'detail_transaksi.*')
                ->first();

            return response()->json(['message' => 'Transaksi berhasil dibuat', 'transaksi' => $transaksi], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Internal Server Error', 'error' => $e->getMessage()], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
