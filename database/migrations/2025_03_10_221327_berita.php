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
        Schema::create('berita', function(Blueprint $table) {
            $table->integer('berita_id')->primary();
            $table->string('berita_judul_ID', 255);
            $table->string('berita_judul_EN', 255);
            $table->string('berita_slug', 355);
            $table->string('berita_gambar', 255);
            $table->text('berita_isi_ID');
            $table->text('berita_isi_EN');
            $table->integer('berita_status');
            $table->integer('berita_views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('berita');
    }
};
