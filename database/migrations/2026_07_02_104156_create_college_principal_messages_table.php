<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegePrincipalMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('college_principal_messages', function (Blueprint $table) {
            $table->id();

            // Profile
            $table->string('principal_name')->nullable();
            $table->string('principal_label')->nullable();
            $table->text('principal_designation')->nullable();
            $table->json('profile_points')->nullable();

            // Message
            $table->string('desk_label')->nullable();
            $table->string('greeting_title')->nullable();
            $table->json('message_paragraphs')->nullable();

            // Highlight
            $table->string('highlight_title')->nullable();
            $table->text('highlight_description')->nullable();

            // Signature / Button
            $table->string('signature_name')->nullable();
            $table->string('signature_designation')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('college_principal_messages');
    }
}