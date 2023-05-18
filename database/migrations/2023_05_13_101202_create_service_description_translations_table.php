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
        Schema::create('service_info_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_info_id')->constrained()->cascadeOnDelete();
            $table->string('box_title');
            $table->string('title');
            $table->text('description');
            $table->text('box_description');
            $table->string('locale', 10)->index();
            $table->unique(['service_info_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_desc_translations');
    }
};
