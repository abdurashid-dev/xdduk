<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->string('address_uz')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('email')->nullable();
            $table->string('name_uz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->longText('about_uz')->nullable();
            $table->longText('about_en')->nullable();
            $table->longText('about_ru')->nullable();
            $table->timestamps();
        });

        $setting = new \App\Models\Setting();
        $setting->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
