<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailFieldsToLearningFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::table('learning_facilities', function (Blueprint $table) {
            $table->string('detail_label')->nullable()->after('gallery_items');
            $table->string('detail_title')->nullable()->after('detail_label');
            $table->string('detail_button_text')->nullable()->after('detail_title');
            $table->string('detail_button_url')->nullable()->after('detail_button_text');
            $table->json('detail_items')->nullable()->after('detail_button_url');
        });
    }

    public function down()
    {
        Schema::table('learning_facilities', function (Blueprint $table) {
            $table->dropColumn([
                'detail_label',
                'detail_title',
                'detail_button_text',
                'detail_button_url',
                'detail_items',
            ]);
        });
    }
}