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
        Schema::create('pengumuman', function(Blueprint $table) {
            $table->integer('pengumuman_id')->primary();
            $table->string('pengumuman_judul_ID', 255);
            $table->string('pengumuman_judul_EN', 255);
            $table->string('pengumuman_slug', 355);
            $table->text('pengumuman_isi_ID');
            $table->text('pengumuman_isi_EN');
            $table->integer('pengumuman_status');
            $table->integer('pengumuman_views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pengumuman');
    }
};
