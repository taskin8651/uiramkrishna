<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeExPrincipalsTable extends Migration
{
    public function up()
    {
        Schema::create('college_ex_principals', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->default(0);
            $table->string('name')->nullable();
            $table->string('post_type')->default('principal'); // principal / incharge
            $table->string('period')->nullable();
            $table->boolean('is_current')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('college_ex_principals');
    }
}