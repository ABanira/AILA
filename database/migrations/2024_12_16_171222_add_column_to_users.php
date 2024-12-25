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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nipp')->unique();
            $table->string('unit_kerja')->nullable();
            $table->string('role')->nullable();
            $table->string('tlpn')->nullable()->unique();
            $table->string('id_img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nipp', 'unit_kerja', 'role', 'tlpn', 'id_img']);
        });
    }
};
