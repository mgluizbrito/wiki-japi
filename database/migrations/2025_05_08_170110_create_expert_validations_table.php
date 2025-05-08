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
        Schema::create('expert_validations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('identification_id')->references('id')->on('community_identifications');
            $table->foreignId('specialist_id')->references('id')->on('specialists');
            $table->text("comment")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expert_validations');
    }
};
