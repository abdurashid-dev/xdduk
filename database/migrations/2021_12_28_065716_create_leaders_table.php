<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->string('time_uz');
            $table->string('time_en');
            $table->string('time_ru');
            $table->longText('bio_uz');
            $table->longText('bio_en');
            $table->longText('bio_ru');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaders');
    }
}
