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
        Schema::create('screen_price_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('screen_price_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('locale', 10)->index();
            $table->unique(['screen_price_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screen_price_translations');
    }
};
