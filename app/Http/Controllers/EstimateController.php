<?php namespace App\Http\Controllers;

// use Sentinel;
use View;
// use Validator;
use Input;
use Redirect;
// use Lang;
// use URL;
use App\Estimate;
use App\EstimateItem;

class EstimateController extends ChandraController {
  public function getEstimates() {
    // get all estimates
    $estimates = Estimate::all();
    return View::make('admin/merck/estimates/index', compact('estimates'));
  }

  public function getCreate() {
    // Show all estimates
    return View::make('admin/merck/estimates/create');
  }

  public function postCreateOrUpdate($id = null) {
    // create or update an estimate in DB
    $estimate = Input::except('support');
    $estimateItem = Input::only('support');

    $insertedEstimate = Estimate::updateOrCreate(['id' => $id], $estimate);
    $insertedEstimateId = $insertedEstimate->id;

    foreach ($estimateItem['support'] as $key => $value) {
      $value['estimate_id'] = (string)$insertedEstimateId;
      if(isset($value['id']) && $value['id'] != "") {
        EstimateItem::where('id', $value['id'])->update($value);
      } else {
        EstimateItem::create($value);
      }
    }

    return Redirect::route('estimates')->with('success', 'Estimate Saved');
  }

  public function showEstimate($id) {
    // show estimate details
    $estimate = Estimate::findOrFail($id);
    $estimateItem = EstimateItem::where('estimate_id', $id)->get();
    return View::make('admin/merck/estimates/show', compact('estimate', 'estimateItem'));
  }

  public function getUpdate() {

  }

  public function postUpdate() {

  }

  public function getDelete() {

  }

  public function getModalDelete() {

  }

  public function getItemDelete($id) {
    EstimateItem::destroy($id);
  }
}