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
            $table->string('dosen_slug', 355);
            $table->string('dosen_email', 255);
            $table->string('dosen_foto', 255);
            $table->text('dosen_deskripsi_ID');
            $table->text('dosen_deskripsi_EN');

            $table->integer('jabatan_id')->nullable();
            $table->integer('konsentrasi_id')->nullable();
            $table->integer('fr_id_1')->nullable();
            $table->integer('fr_id_2')->nullable();

            $table->string('dosen_keahlian_ID', 255);
            $table->string('dosen_keahlian_EN', 255);

            $table->string('dosen_scholar', 255);
            $table->string('dosen_orcid', 255);
            $table->string('dosen_scopus', 255);
            $table->string('dosen_sinta', 255);
            $table->string('dosen_s1', 255);
            $table->string('dosen_s2', 255);
            $table->string('dosen_s3', 255);
            $table->timestamps();

            $table->foreign('jabatan_id')->references('jabatan_id')->on('jabatan')->onDelete('set null');
            $table->foreign('fr_id_1')->references('fr_id')->on('fr')->onDelete('set null');
            $table->foreign('fr_id_2')->references('fr_id')->on('fr')->onDelete('set null');
            $table->foreign('konsentrasi_id')->references('konsentrasi_id')->on('konsentrasi')->onDelete('set null');
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