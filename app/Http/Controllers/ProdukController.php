<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produk::all());
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
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk = Produk::create($validated);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan.',
            'data' => $produk
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
        }

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama_produk' => 'sometimes|required|string|max:100',
            'harga' => 'sometimes|required|integer|min:0',
            'stok' => 'sometimes|required|integer|min:0',
        ]);

        $produk->update($validated);

        return response()->json([
            'message' => 'Produk berhasil diperbarui.',
            'data' => $produk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan.'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus.']);
    }
}
