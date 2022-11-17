<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detal_price_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->references('id')->on('courses');
            $table->integer('sequence');
            $table->bigInteger('price');   
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
        Schema::dropIfExists('detal_price_courses');
    }
};
