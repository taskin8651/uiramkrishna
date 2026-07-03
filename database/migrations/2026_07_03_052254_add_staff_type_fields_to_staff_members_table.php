<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStaffTypeFieldsToStaffMembersTable extends Migration
{
    public function up()
    {
        Schema::table('staff_members', function (Blueprint $table) {
            $table->string('staff_type')->default('teaching')->after('department_id');
            // teaching / non_teaching

            $table->string('designation_type')->nullable()->after('designation');
            // principal / professor / associate / assistant / guest / staff
        });
    }

    public function down()
    {
        Schema::table('staff_members', function (Blueprint $table) {
            $table->dropColumn(['staff_type', 'designation_type']);
        });
    }
}