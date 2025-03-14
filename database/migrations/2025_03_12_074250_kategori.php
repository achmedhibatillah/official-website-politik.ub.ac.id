<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori', function(Blueprint $table) {
            $table->integer('kategori_id')->primary();
            $table->string('kategori_judul_ID', 255);
            $table->string('kategori_judul_EN', 255);
            $table->string('kategori_icon', 255);
            $table->integer('kategori_urutan');
            $table->integer('kategori_status')->default(1); // 1 = tanpa dropdown, 2 = dgn dropdown
            $table->string('kategori_slug', 255)->nullable(); // hanya bisa diisi jika kategori_status = 2
            $table->integer('kategori_show')->nullable(); // 0 = tak ditampilkan, 1 = ditampilkan
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('kategori');
    }
};
