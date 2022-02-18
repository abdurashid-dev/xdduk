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
            $table->string('position_uz');
            $table->string('position_en')->nullable();
            $table->string('position_ru')->nullable();
            $table->string('name_uz');
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('number');
            $table->string('email');
            $table->string('time_uz');
            $table->string('time_en')->nullable();
            $table->string('time_ru')->nullable();
            $table->longText('bio_uz');
            $table->longText('bio_en')->nullable();
            $table->longText('bio_ru')->nullable();
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
