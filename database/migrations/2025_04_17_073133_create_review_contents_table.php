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
        Schema::create('review_contents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable(); // Optional name
            $table->unsignedTinyInteger('star'); // Star rating: 1–5
            $table->string('back_img')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_contents');
    }
};
