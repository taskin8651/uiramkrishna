<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('learning_facilities', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('css_prefix')->nullable();

            $table->string('hero_icon')->nullable();
            $table->string('hero_kicker')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();

            $table->string('image_badge')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->text('image_description')->nullable();

            $table->string('panel_subtitle')->nullable();
            $table->string('panel_title')->nullable();
            $table->text('lead_description')->nullable();

            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->boolean('button_external')->default(false);

            $table->json('features')->nullable();

            $table->string('gallery_label')->nullable();
            $table->string('gallery_title')->nullable();
            $table->text('gallery_description')->nullable();
            $table->json('gallery_items')->nullable();

            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('learning_facilities');
    }
}