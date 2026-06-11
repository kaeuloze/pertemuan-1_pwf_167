<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index() {
        try {
            $categories = Category::all();
            return response()->json([
                'message' => 'Daftar kategori berhasil diambil',
                'data' => $categories
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data kategori', [
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:categories,name|max:255'
            ]);

            $category = Category::create($validated);

            Log::info('Menambah data kategori', [
                'category' => $category
            ]);

            return response()->json([
                'message' => 'Kategori berhasil dibuat!',
                'data' => $category
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah kategori', [
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function show($id) {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Kategori tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'message' => 'Kategori retrieved successfully',
                'data' => $category
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil detail kategori', [
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json([
                    'message' => 'Kategori tidak ditemukan'
                ], 404);
            }
            
            $validated = $request->validate([
                'name' => 'required|max:255|unique:categories,name,' . $id
            ]);

            $category->update($validated);

            Log::info('Memperbarui data kategori', [
                'category' => $category
            ]);

            return response()->json([
                'message' => 'Kategori berhasil diupdate!',
                'data' => $category
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Throwable $e) {
            Log::error('Gagal memperbarui kategori', [
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function destroy($id) {
        try {
            // 🔒 Hanya Admin yang boleh hapus kategori (manage-product gate)
            Gate::authorize('manage-product');

            $category = Category::find($id);
            if (!$category) {
                return response()->json([
                    'message' => 'Kategori tidak ditemukan'
                ], 404);
            }

            $category->delete();

            Log::info('Menghapus data kategori', [
                'id' => $id
            ]);

            return response()->json([
                'message' => 'Kategori berhasil dihapus!'
            ], 200);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return response()->json([
                'message' => 'Forbidden'
            ], 403);
        } catch (\Throwable $e) {
            Log::error('Gagal menghapus kategori', [
                'message' => $e->getMessage()
            ]);
            return response()->json([
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }
}