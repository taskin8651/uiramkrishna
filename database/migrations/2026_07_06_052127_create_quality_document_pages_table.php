<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityDocumentPagesTable extends Migration
{
    public function up()
    {
        Schema::create('quality_document_pages', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('css_prefix')->nullable();

            // grid = AQAR type, single_pdf = NAAC type
            $table->string('template_type')->default('grid');

            $table->string('subtitle_icon')->nullable();
            $table->string('subtitle_text')->nullable();
            $table->string('card_title')->nullable();

            $table->string('official_button_text')->nullable();
            $table->string('official_button_url')->nullable();

            $table->json('pdf_items')->nullable();

            $table->json('meta_items')->nullable();

            $table->boolean('preview_enabled')->default(false);
            $table->string('preview_subtitle_icon')->nullable();
            $table->string('preview_subtitle_text')->nullable();
            $table->string('preview_title')->nullable();
            $table->string('preview_button_text')->nullable();
            $table->string('preview_pdf_url')->nullable();
            $table->string('preview_iframe_title')->nullable();

            $table->string('download_button_text')->nullable();

            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quality_document_pages');
    }
}