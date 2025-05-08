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
        Schema::create('atropelamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('photo')->nullable();
            $table->datetime('datetime');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);

            $table->foreignId('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atropelamentos');
    }
};
