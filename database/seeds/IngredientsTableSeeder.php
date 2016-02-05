<?php

use App\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->delete();

        Ingredient::create(array(
          'Name' => 'Flour',
          'MeasurementType' => 'cups'
        ));

        Ingredient::create(array(
          'Name' => 'Butter',
          'MeasurementType' => 'tablespoon'
        ));

        Ingredient::create(array(
          'Name' => 'Baking Powder',
          'MeasurementType' => 'teaspoons'
        ));

        Ingredient::create(array(
          'Name' => 'Eggs',
          'MeasurementType' => 'ea'
        ));

        Ingredient::create(array(
          'Name' => 'Oil',
          'MeasurementType' => 'tablespoons'
        ));
    }
}
