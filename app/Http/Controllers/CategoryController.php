<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Menyuruh Laravel membuka file resources/views/category/index.blade.php
        return view('category.index');
    }

    public function create()
    {
        // Kosongkan dulu untuk sekarang
    }

    public function store(Request $request)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function show($id)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function edit($id)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function update(Request $request, $id)
    {
        // Kosongkan dulu untuk sekarang
    }

    public function destroy($id)
    {
        // Kosongkan dulu untuk sekarang
    }
}