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
    Schema::create('cicilans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('utang_id')->constrained('utangs')->cascadeOnDelete();
        $table->integer('jumlah_bayar');
        $table->date('tanggal_bayar');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cicilans');
    }
};
