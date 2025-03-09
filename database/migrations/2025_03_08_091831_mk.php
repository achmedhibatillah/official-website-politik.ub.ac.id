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
        Schema::create('mk', function(Blueprint $table) {
            $table->string('mk_id', 20)->primary();
            $table->string('mk_mk_ID', 255);
            $table->string('mk_mk_EN', 255);
            $table->text('mk_deskripsi_ID');
            $table->text('mk_deskripsi_EN');
            $table->integer('mk_semester');
            $table->integer('mk_sks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('mk');
    }
};
