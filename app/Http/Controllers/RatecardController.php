<?php namespace App\Http\Controllers;

// use Sentinel;
use View;
// use Validator;
use Input;
// use Redirect;
// use Lang;
// use URL;
use App\Ratecard;

class RatecardController extends ChandraController {
    public function getRatecards() {
        // get all ratecards
        $ratecards = Ratecard::all();
        return View::make('admin/merck/ratecards/index', compact('ratecards'));
    }

    public function getCreate() {
        // Show the page
        return View::make('admin/merck/ratecards/create');
    }


    public function postCreate() {
        // create new ratecard in DB
        Ratecard::create(Input::all());
        return Redirect::route('ratecards')->with('success', 'New Ratecard Added');
    }

    public function showRatecard($id) {
        // show ratecard info
        $ratecard = Ratecard::findOrFail($id);
        return View::make('admin/merck/ratecards/show', compact('ratecard'));
    }

    public function getUpdate() {

    }

    public function postUpdate() {

    }

    public function getDelete() {

    }

    public function getModalDelete() {

    }
}