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
            $table->string('card_title')->nullable();

            $table->json('pdf_items')->nullable();

            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quality_document_pages');
    }
}
