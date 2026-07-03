<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailFieldsToDownloadItemsTable extends Migration
{
    public function up()
    {
        Schema::table('download_items', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');

            $table->string('kicker_text')->nullable()->after('slug');
            $table->string('hero_title')->nullable()->after('kicker_text');
            $table->text('hero_description')->nullable()->after('hero_title');

            $table->string('document_code')->nullable()->after('year');
            $table->string('authority')->nullable()->after('document_code');
            $table->string('document_date')->nullable()->after('authority');
            $table->string('session_reference')->nullable()->after('document_date');
            $table->string('class_start')->nullable()->after('session_reference');

            $table->json('summary_items')->nullable()->after('class_start');
            $table->json('info_cards')->nullable()->after('summary_items');
            $table->json('table_rows')->nullable()->after('info_cards');

            $table->string('external_url')->nullable()->after('table_rows');
        });
    }

    public function down()
    {
        Schema::table('download_items', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'kicker_text',
                'hero_title',
                'hero_description',
                'document_code',
                'authority',
                'document_date',
                'session_reference',
                'class_start',
                'summary_items',
                'info_cards',
                'table_rows',
                'external_url',
            ]);
        });
    }
}