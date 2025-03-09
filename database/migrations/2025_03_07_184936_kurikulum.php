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
        Schema::create('kurikulum', function(Blueprint $table) {
            $table->integer('kurikulum_id')->primary();
            $table->string('kurikulum_judul_ID', 255);
            $table->string('kurikulum_judul_EN', 255);
            $table->date('kurikulum_mulai');
            $table->string('kurikulum_silabus', 255);
            $table->text('kurikulum_deskripsi_ID');
            $table->text('kurikulum_deskripsi_EN');
            $table->boolean('kurikulum_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
