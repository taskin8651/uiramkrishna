<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('feedback_documents', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback_documents');
    }
}
