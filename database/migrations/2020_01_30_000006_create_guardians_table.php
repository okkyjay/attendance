<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->string('surname');

            $table->string('initials');

            $table->string('email')->unique();

            $table->string('phone_number');

            $table->longText('address')->nullable();

            $table->longText('bio')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
