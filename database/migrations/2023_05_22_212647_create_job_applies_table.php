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
        Schema::create('job_applies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('user_note')->nullable();
            $table->tinyInteger('gender');
            $table->string('cv');
            $table->boolean('status')->default(0);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->boolean('is_replayed')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applies');
    }
};
