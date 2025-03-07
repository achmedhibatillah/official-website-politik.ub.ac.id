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
            $table->text('dosen_deskripsi');
            $table->integer('konsentrasi_id');
            $table->integer('fr_id_1');
            $table->integer('fr_id_2');
            $table->string('dosen_keahlian', 255);
            $table->text('dosen_mk_ganjil');
            $table->text('dosen_mk_genap');
            $table->string('dosen_scholar', 255);
            $table->string('dosen_orcid', 255);
            $table->string('dosen_scopus', 255);
            $table->string('dosen_sinta', 255);
            $table->string('dosen_s1', 255);
            $table->string('dosen_s2', 255);
            $table->string('dosen_s3', 255);
            $table->timestamps();

            $table->foreign('fr_id_1')->references('fr_id')->on('fr');
            $table->foreign('fr_id_2')->references('fr_id')->on('fr');
            $table->foreign('konsentrasi_id')->references('konsentrasi_id')->on('konsentrasi');
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
