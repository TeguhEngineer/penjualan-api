<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller

{
    public function countData()
    {
        // $user = auth()->user(); // kalau pakai Sanctum

        return response()->json([
            'produk' => Produk::count(),
            'mitra' => Mitra::count(),
            'transaksi' => Transaksi::where('user_id', Auth::user()->id)->count(),
        ]);
    }
    public function getUser()
    {
        return response()->json(User::all());
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login gagal.'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil.',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]
            // 'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        // Menghapus token saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Berhasil logout.'
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'message' => 'User berhasil didaftarkan.',
            'user' => $user
        ], 201);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user(); // ambil user dari token Sanctum

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|min:6',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Profil berhasil diperbarui.',
            'user' => $user
        ]);
    }
}
