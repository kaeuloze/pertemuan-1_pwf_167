//2026_03_08_082002_create_categories_table.php
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
   Schema::create('categories', function (Blueprint $table) { // Membuat tabel 'categories' dan mendefinisikan strukturnya

    $table->id(); // Membuat kolom 'id' sebagai primary key (auto increment)
    $table->string('name')->unique(); // Membuat kolom 'name' bertipe string dan harus unik (tidak boleh duplikat)
    $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void // Method untuk membatalkan migrasi (rollback)
    {
        Schema::dropIfExists('categories'); // Menghapus tabel 'categories' jika ada
    }
};