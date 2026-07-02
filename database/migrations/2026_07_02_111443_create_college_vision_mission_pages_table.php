<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeVisionMissionPagesTable extends Migration
{
    public function up()
    {
        Schema::create('college_vision_mission_pages', function (Blueprint $table) {
            $table->id();

            // Vision
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->text('vision_highlight')->nullable();
            $table->json('vision_points')->nullable();

            // Mission
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->text('mission_highlight')->nullable();
            $table->json('mission_points')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('college_vision_mission_pages');
    }
}