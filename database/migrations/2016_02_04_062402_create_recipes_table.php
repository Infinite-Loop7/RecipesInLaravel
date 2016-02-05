<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('RecipeId');
            $table->string('Name');
            $table->string('Description');
            $table->timestamps();
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('IngredientId');
            $table->string('Name');
            $table->string('MeasurementType');
            $table->timestamps();
            $table->unique(array('Name', 'MeasurementType'));
        });

        Schema::create('recipesIng', function (Blueprint $table) {
            $table->integer('RecId')->unsigned();
            $table->integer('IngId')->unsigned();
            $table->decimal('Measurement', 6, 4);
            $table->timestamps();
            $table->foreign('RecId')->references('RecipeId')->on('recipes');
            $table->foreign('IngId')->references('IngredientId')->on('ingredients');
            $table->primary(array('RecId', 'IngId'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipes');
        Schema::drop('ingredients');
        Schema::drop('recipesIng');
    }
}
