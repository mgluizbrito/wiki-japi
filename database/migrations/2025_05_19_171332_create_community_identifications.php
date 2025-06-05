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
        Schema::create('community_identifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('observation_id')->references('id')->on('observations');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('scientific_name');
            $table->string('common_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_identifications');
    }
};
