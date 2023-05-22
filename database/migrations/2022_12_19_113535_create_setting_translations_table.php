<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('setting_id')->constrained();
            $table->string('site_name', 70);
            $table->string('locale', 10)->index();
            $table->text('site_description');
            $table->text('site_keyword');
            $table->text('header_message');
            $table->text('site_closed_msg');
            $table->string('facebook', 150)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->string('linkedin', 100)->nullable();
            $table->string('instagram', 100)->nullable();
            $table->string('whatsapp', 100)->nullable();
            $table->string('telegram', 100)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('snapchat')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('email', 30);
            $table->text('about');
            $table->string('address');
            $table->string('digital_title')->nullable();
            $table->text('digital_text')->nullable();
            $table->text('privacy_title')->nullable();
            $table->text('privacy_body')->nullable();
            $table->text('terms_title')->nullable();
            $table->text('terms_body')->nullable();
            $table->text('terms')->nullable();
            $table->string('cctv_title')->nullable();
            $table->string('cctv_title_two')->nullable();
            $table->text('cctv_description')->nullable();
            $table->string('social_title')->nullable();
            $table->text('social_description')->nullable();
            $table->text('client_text')->nullable();
            $table->unique(['locale', 'setting_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
};
