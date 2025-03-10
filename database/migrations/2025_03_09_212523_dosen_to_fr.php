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
        Schema::create('dosen_to_fr', function (Blueprint $table) {
            $table->integer('relation_id')->primary();
            $table->integer('dosen_id');
            $table->integer('fr_id');
            $table->timestamps();
        
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->onDelete('cascade');
            $table->foreign('fr_id')->references('fr_id')->on('fr')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('dosen_to_fr');
    }
};
