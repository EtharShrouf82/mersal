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
        Schema::create('why_digital_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('why_digital_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('locale', 10)->index();
            $table->unique(['why_digital_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_digital_translations');
    }
};
