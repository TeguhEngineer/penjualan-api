<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::where('user_id', Auth::user()->id)->with(['detail.produk', 'mitra'])->latest()->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mitra_id' => 'required|exists:mitras,id',
            // 'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.produk_id' => 'required|exists:produks,id',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.harga_satuan' => 'required|integer|min:0',
        ]);

        DB::beginTransaction();
        try {
            $total = 0;

            $transaksi = \App\Models\Transaksi::create([
                'mitra_id' => $request->mitra_id,
                'user_id' => Auth::user()->id,
                'tanggal' => $request->tanggal,
                'total' => 0 // sementara
            ]);

            foreach ($request->items as $item) {
                $subtotal = $item['jumlah'] * $item['harga_satuan'];
                $transaksi->detail()->create([
                    'produk_id' => $item['produk_id'],
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $item['harga_satuan'],
                    'subtotal' => $subtotal
                ]);
                $total += $subtotal;
            }

            $transaksi->update(['total' => $total]);

            DB::commit();
            return response()->json([
                'message' => 'Transaksi berhasil disimpan',
                'data' => $transaksi->load('detail.produk')
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan transaksi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaksi::with(['detail.produk', 'mitra'])->find($id);
        if (!$data) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
