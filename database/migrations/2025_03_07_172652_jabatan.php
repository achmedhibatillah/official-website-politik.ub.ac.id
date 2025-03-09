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
        Schema::create('jabatan', function(Blueprint $table) {
            $table->integer('jabatan_id')->primary();
            $table->string('jabatan_jabatan_ID')->nullable(false);
            $table->string('jabatan_jabatan_EN')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('jabatan');
    }
};
