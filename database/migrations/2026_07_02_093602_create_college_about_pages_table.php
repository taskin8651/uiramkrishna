<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('college_about_pages', function (Blueprint $table) {
            $table->id();

            // About Section
            $table->string('about_title')->nullable();
            $table->string('about_highlight')->nullable();
            $table->text('about_lead')->nullable();
            $table->text('about_description')->nullable();
            $table->string('info_title')->nullable();
            $table->text('info_description')->nullable();
            $table->json('points')->nullable();

            // Media Content
            $table->string('media_title')->nullable();
            $table->json('stats')->nullable();

            // History
            $table->string('history_title')->nullable();
            $table->text('history_description')->nullable();
            $table->json('history_items')->nullable();

            // Profile
            $table->string('profile_title')->nullable();
            $table->text('profile_description')->nullable();
            $table->json('profile_tags')->nullable();

            // Vision Mission
            $table->string('vm_title')->nullable();
            $table->text('vm_description')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->json('missions')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('college_about_pages');
    }
};