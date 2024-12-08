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
        Schema::create('tlemari', function (Blueprint $table) {
            $table->id();
            $table->string('lemari_nama');
            $table->string('lemari_unit');
            $table->string('lemari_ip')->unique();
            $table->string('lemari_1');
            $table->string('lemari_2');
            $table->string('lemari_3');
            $table->string('lemari_4');
            $table->string('lemari_5');
            $table->string('lemari_6');
            $table->string('lemari_7');
            $table->string('lemari_8');
            $table->string('lemari_9');
            $table->string('lemari_10');
            $table->string('lemari_11');
            $table->string('lemari_12');
            $table->string('lemari_13');
            $table->string('lemari_14');
            $table->string('lemari_15');
            $table->string('lemari_16');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tlemari');
    }
};
