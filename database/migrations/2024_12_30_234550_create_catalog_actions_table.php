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
        Schema::create('catalog_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->foreignId('catalog_id')->constrained()->nullable()->onDelete('cascade'); // Foreign key to catalogs table
            $table->enum('action_type', ['Pinjam', 'Kembali', 'Manual']); // Enum for action type (Pinjam or Kembali)
            $table->text('action_detail')->nullable(); // Action detail (e.g., reason for borrowing/returning)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_actions');
    }
};
