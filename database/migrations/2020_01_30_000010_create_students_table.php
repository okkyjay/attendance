<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name');

            $table->string('middle_name')->nullable();

            $table->string('last_name');

            $table->string('gender');

            $table->longText('bio')->nullable();

            $table->string('school_name')->nullable();

            $table->string('school_address')->nullable();

            $table->string('class')->nullable();

            $table->string('phone_number')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
