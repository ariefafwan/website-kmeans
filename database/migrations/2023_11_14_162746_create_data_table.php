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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('desa_id')->unsigned();
            $table->foreign('desa_id')->references('id')->on('desas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('clus_hasil_id')->unsigned()->nullable();
            $table->foreign('clus_hasil_id')->references('id')->on('clus_hasils')->onDelete('cascade')->onUpdate('cascade');
            $table->float('ph_air');
            $table->float('ph_tanah');
            $table->float('suhu');
            $table->string('sample');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
