<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->string('sub_menu_id')->nullable();
            $table->string('name_uz');
            $table->string('name_en');
            $table->string('name_ru');
            $table->longText('content_uz');
            $table->longText('content_en');
            $table->longText('content_ru');
            $table->string('order');
            $table->boolean('is_active')->default(true);
            $table->string('slug');
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
        Schema::dropIfExists('pages');
    }
}
