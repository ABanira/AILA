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
        Schema::table('tlemari', function (Blueprint $table) {
            $table->string('lemari_nama', 50)->change();
            $table->string('lemari_ip', 15)->change();
            $table->string('lemari_1', 8)->change();
            $table->string('lemari_2', 8)->change();
            $table->string('lemari_3', 8)->change();
            $table->string('lemari_4', 8)->change();
            $table->string('lemari_5', 8)->change();
            $table->string('lemari_6', 8)->change();
            $table->string('lemari_7', 8)->change();
            $table->string('lemari_8', 8)->change();
            $table->string('lemari_9', 8)->change();
            $table->string('lemari_10', 8)->change();
            $table->string('lemari_11', 8)->change();
            $table->string('lemari_12', 8)->change();
            $table->string('lemari_13', 8)->change();
            $table->string('lemari_14', 8)->change();
            $table->string('lemari_15', 8)->change();
            $table->string('lemari_16', 8)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tlemari', function (Blueprint $table) {
            $table->string('lemari_nama')->change();
            $table->string('lemari_ip')->change();
            $table->string('lemari_1')->change();
            $table->string('lemari_2')->change();
            $table->string('lemari_3')->change();
            $table->string('lemari_4')->change();
            $table->string('lemari_5')->change();
            $table->string('lemari_6')->change();
            $table->string('lemari_7')->change();
            $table->string('lemari_8')->change();
            $table->string('lemari_9')->change();
            $table->string('lemari_10')->change();
            $table->string('lemari_11')->change();
            $table->string('lemari_12')->change();
            $table->string('lemari_13')->change();
            $table->string('lemari_14')->change();
            $table->string('lemari_15')->change();
            $table->string('lemari_16')->change();
        });
    }
};
