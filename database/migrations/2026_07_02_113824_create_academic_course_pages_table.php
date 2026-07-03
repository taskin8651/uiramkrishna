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
       Schema::create('academic_course_pages', function (Blueprint $table) {
    $table->id();
    $table->string('slug')->unique(); 
    // senior-secondary, ug, pg, vocational

    $table->string('css_prefix')->nullable(); 
    // ssc, ug, pg, voc

    $table->string('kicker_text')->nullable();
    $table->string('hero_title')->nullable();
    $table->text('hero_description')->nullable();

    $table->string('summary_label')->nullable();
    $table->string('summary_title')->nullable();
    $table->text('summary_description')->nullable();
    $table->json('summary_stats')->nullable();

    $table->string('note_title')->nullable();
    $table->text('note_description')->nullable();

    $table->string('panel_label')->nullable();
    $table->string('panel_title')->nullable();
    $table->string('button_text')->nullable();
    $table->string('button_url')->nullable();

    $table->string('table_label')->nullable();
    $table->string('table_title')->nullable();
    $table->string('download_button_text')->nullable();
    $table->string('download_button_url')->nullable();

    $table->boolean('status')->default(1);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_course_pages');
    }
};
