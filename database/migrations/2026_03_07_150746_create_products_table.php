//2026_03_08_081942_create_products_table.php
<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor class Migration untuk membuat migrasi database
use Illuminate\Database\Schema\Blueprint; // Mengimpor Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor Schema untuk menjalankan operasi database

return new class extends Migration // Mendeklarasikan class anonim yang mewarisi Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // Method yang dijalankan saat migrasi dijalankan (membuat tabel)
{
    Schema::create('products', function (Blueprint $table) { // Membuat tabel 'products' dan mendefinisikan strukturnya
        
        $table->id(); // Membuat kolom 'id' sebagai primary key (auto increment)
        $table->string('name'); // Membuat kolom 'name' bertipe string untuk nama produk
        $table->integer('qty'); // Membuat kolom 'qty' bertipe integer untuk jumlah stok produk
        $table->decimal('price', 10, 2); // Membuat kolom 'price' bertipe decimal (total 10 digit, 2 digit di belakang koma)
        
        // membuat Relasi ke User (Pemilik Produk)
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Membuat kolom 'user_id' sebagai foreign key ke tabel 'users' dan akan terhapus otomatis jika user dihapus
        
        // menambahkan Relasi ke Category
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Membuat kolom 'category_id' sebagai foreign key ke tabel 'categories' dan akan terhapus otomatis jika kategori dihapus
        
        $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void // Method untuk membatalkan migrasi (rollback)
    {
        Schema::dropIfExists('products'); // Menghapus tabel 'products' jika ada
    }
};