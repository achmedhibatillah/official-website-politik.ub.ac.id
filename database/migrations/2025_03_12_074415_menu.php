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
            $table->string('menu_gambar', 255)->nullable();
            $table->text('menu_isi_ID')->nullable();
            $table->text('menu_isi_EN')->nullable();
            $table->integer('menu_urutan');
            $table->integer('menu_status')->default(0); // tampilan navbar: 0 = biasa, 1 = bold, 2 = new, 3 = penting
            $table->integer('menu_as'); // 0 = default (builder), 1 = default (1), 2 = default (1-M), 3 = tambahan (1), 4 = tambahan (1-M)
            $table->integer('menu_relation')->default(0); // berlaku jika menu_as = 2 atau 4: isinya adalah menu_id induknya
            $table->integer('menu_show')->nullable(); // 0 = tak ditampilkan, 1 = ditampilkan
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
