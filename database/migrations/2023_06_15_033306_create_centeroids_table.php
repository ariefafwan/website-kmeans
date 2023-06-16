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
        Schema::create('centeroids', function (Blueprint $table) {
            $table->id();
            $table->float('distancecentroid1');
            $table->float('distancecentroid2');
            $table->float('distancecentroid3');
            $table->float('mindistance');
            $table->integer('cluster');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centeroids');
    }
};
