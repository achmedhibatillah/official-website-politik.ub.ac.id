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
        Schema::create('dosen_to_mk', function (Blueprint $table) {
            $table->integer('relation_id')->primary();
            $table->integer('dosen_id');
            $table->string('mk_id');
            $table->timestamps();
        
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->onDelete('cascade');
            $table->foreign('mk_id')->references('mk_id')->on('mk')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('dosen_to_mk');
    }
};
