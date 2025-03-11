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
            $table->integer('kategori_status')->default(1);
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
