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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->foreign('lemari_id')->references('id')->on('lemaris')->onDelete('cascade');
            $table->enum('lokasi_laci', ['laci_1', 'laci_2', 'laci_3', 'laci_4', 'laci_5', 'laci_6', 'laci_7', 'laci_8']);
            $table->string('status')->nullable();
            $table->string('kondisi_alat');
            $table->string('img_alat');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
