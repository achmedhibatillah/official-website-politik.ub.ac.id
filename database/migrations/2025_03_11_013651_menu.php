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
        Schema::create('menu', function(BLueprint $table) {
            $table->integer('menu_id')->primary();
            $table->string('menu_judul_ID', 255);
            $table->string('menu_judul_EN', 255);
            $table->string('menu_slug', 355);
            $table->string('menu_gambar', 255);
            $table->text('menu_isi_ID');
            $table->text('menu_isi_EN');
            $table->integer('menu_status')->default(0);
            $table->integer('menu_show')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('menu');
    }
};
