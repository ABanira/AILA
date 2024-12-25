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
        Schema::create('lemaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lemari');
            $table->string('lokasi_unit');
            $table->string('ip_control');
            $table->string('laci_1');
            $table->string('laci_2');
            $table->string('laci_3');
            $table->string('laci_4');
            $table->string('laci_5');
            $table->string('laci_6');
            $table->string('laci_7');
            $table->string('laci_8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lemaris');
    }
};
