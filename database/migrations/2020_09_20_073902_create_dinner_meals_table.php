<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDinnerMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dinner_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_date_id');
            $table->unsignedBigInteger('food_id');
            $table->foreign('meal_date_id')->references('id')->on('meal_dates')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
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
        Schema::dropIfExists('dinner_meals');
    }
}
