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
        Schema::create('bandara_penerbangans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger("penerbangan_id")->unsigned()->index();
            $table->foreign("penerbangan_id")->references("id")->on("penerbangans");

            $table->bigInteger("bandara_id")->unsigned()->index();
            $table->foreign("bandara_id")->references("id")->on("bandaras");

            $table->bigInteger("tx_id")->unsigned()->index()->nullable(false)->default('10');
            $table->enum("tx-arah", array('berangkat', 'kedatangan'))->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandara_penerbangans');
    }
};
