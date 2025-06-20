<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Mitra::all());
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
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $mitra = Mitra::create($validated);

        return response()->json([
            'message' => 'Mitra berhasil ditambahkan.',
            'data' => $mitra
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mitra = Mitra::find($id);
        if (!$mitra) {
            return response()->json(['message' => 'Mitra tidak ditemukan.'], 404);
        }

        return response()->json($mitra);
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
        $mitra = Mitra::find($id);
        if (!$mitra) {
            return response()->json(['message' => 'Mitra tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:100',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $mitra->update($validated);

        return response()->json([
            'message' => 'Mitra berhasil diperbarui.',
            'data' => $mitra
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::find($id);
        if (!$mitra) {
            return response()->json(['message' => 'Mitra tidak ditemukan.'], 404);
        }

        $mitra->delete();

        return response()->json(['message' => 'Mitra berhasil dihapus.']);
    }
}
