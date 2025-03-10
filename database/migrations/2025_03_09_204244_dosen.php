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
        Schema::create('dosen', function(Blueprint $table) {
            $table->integer('dosen_id')->primary();
            $table->string('dosen_nama', 255)->nullable(false);
            $table->bigInteger('dosen_nomor')->nullable();
            $table->string('dosen_slug', 355);
            $table->string('dosen_email', 255);
            $table->string('dosen_foto', 255);

            $table->text('dosen_deskripsi_ID');
            $table->text('dosen_deskripsi_EN');

            $table->string('dosen_konsentrasi_ID', 255);
            $table->string('dosen_konsentrasi_EN', 255);

            $table->string('dosen_keahlian_ID', 255);
            $table->string('dosen_keahlian_EN', 255);

            $table->string('dosen_scholar', 255)->nullable();
            $table->string('dosen_orcid', 255)->nullable();
            $table->string('dosen_scopus', 255)->nullable();
            $table->string('dosen_sinta', 255)->nullable();
            
            $table->string('dosen_s1', 255)->nullable();
            $table->string('dosen_s2', 255)->nullable();
            $table->string('dosen_s3', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('dosen');
    }
};