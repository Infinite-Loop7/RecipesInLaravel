<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IngredientsController extends Controller
{
  /**
   * Send back all ingredients as JSON
   *
   * @return Response
   */
  public function index()
  {
      return Response::json(Ingredient::get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
      Ingredient::create(array(
          'Name' => Input::get('Name'),
          'MeasurementType' => Input::get('MeasurementType')
      ));

      return Response::json(array('success' => true));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Ingredient::destroy($id);

      return Response::json(array('success' => true));
  }
}
