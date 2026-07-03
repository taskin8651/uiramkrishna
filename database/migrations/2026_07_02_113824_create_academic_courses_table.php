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
        Schema::create('academic_courses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('academic_course_page_id')->constrained()->cascadeOnDelete();

    $table->integer('sort_order')->default(0);
    $table->string('icon_class')->nullable();

    $table->string('stream_label')->nullable();
    $table->string('course_name')->nullable();
    $table->text('description')->nullable();

    $table->string('duration')->nullable();
    $table->string('eligibility')->nullable();
    $table->string('type_label')->nullable();

    $table->boolean('status')->default(1);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_courses');
    }
};
