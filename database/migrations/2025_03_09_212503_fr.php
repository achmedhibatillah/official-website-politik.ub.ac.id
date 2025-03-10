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
        Schema::create('fr', function(Blueprint $table) {
            $table->integer('fr_id')->primary();
            $table->string('fr_fr_ID', 255)->nullable(false);
            $table->string('fr_fr_EN', 255)->nullable(false);
            $table->text('fr_deskripsi_ID');
            $table->text('fr_deskripsi_EN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('fr');
    }
};
