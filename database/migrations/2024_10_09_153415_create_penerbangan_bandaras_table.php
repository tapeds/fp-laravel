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
        Schema::create('penerbangan_bandaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerbangan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('bandara_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('arah', array('berangkat', 'kedatangan'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbangan_bandara');
    }
};
