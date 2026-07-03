<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicInfoPagesTable extends Migration
{
    public function up()
    {
        Schema::create('academic_info_pages', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            // po-pso / alumni

            $table->string('kicker_text')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();

            $table->string('section_label')->nullable();
            $table->string('section_title')->nullable();
            $table->text('section_description')->nullable();

            $table->json('cards')->nullable();
            $table->json('table_rows')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('academic_info_pages');
    }
}