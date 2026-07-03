<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('campus_facilities', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('css_prefix')->nullable();

            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->text('image_description')->nullable();

            $table->string('panel_title')->nullable();
            $table->text('lead_description')->nullable();

            $table->json('features')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campus_facilities');
    }
}