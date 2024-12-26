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
            $table->string('ip_control')->unique();
            $table->integer('laci_1')->nullable();
            $table->integer('laci_2')->nullable();
            $table->integer('laci_3')->nullable();
            $table->integer('laci_4')->nullable();
            $table->integer('laci_5')->nullable();
            $table->integer('laci_6')->nullable();
            $table->integer('laci_7')->nullable();
            $table->integer('laci_8')->nullable();
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
