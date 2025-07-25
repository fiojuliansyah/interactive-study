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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('result')->nullable();
            $table->string('visual')->nullable();
            $table->string('auditory')->nullable();
            $table->string('kinesthetic')->nullable();
            $table->string('total_correct')->nullable();
            $table->string('total_wrong')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};
