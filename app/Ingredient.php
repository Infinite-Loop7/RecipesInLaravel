<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = array('Name', 'MeasurementType');
}
