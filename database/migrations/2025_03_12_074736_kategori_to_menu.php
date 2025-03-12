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
        Schema::create('kategori_to_menu', function (Blueprint $table) {
            $table->integer('relation_id')->primary();
            $table->integer('kategori_id');
            $table->integer('menu_id');
            $table->timestamps();
        
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori')->onDelete('cascade');
            $table->foreign('menu_id')->references('menu_id')->on('menu')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('kategori_to_menu');
    }
};