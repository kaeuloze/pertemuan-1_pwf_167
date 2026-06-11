<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User; // Penting untuk memanggil Model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting untuk fitur Login
use Illuminate\Support\Facades\Log;  // Penting untuk fitur Log
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getToken(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (! Auth::attempt($data)) {
                Log::info('[Auth - API] Email atau password salah');

                return response()->json([
                    'message' => 'Email atau password salah',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();
            
            // Membuat token menggunakan Laravel Sanctum
            $token = $user->createToken('api_token')->plainTextToken;
            
            Log::info('Token dibuat: ' . $token);

            return response()->json([
                'message' => 'Login berhasil',
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);

        } catch (\Throwable $e) {
            Log::error('Error saat login', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan pada server',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}