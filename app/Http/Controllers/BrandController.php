<?php namespace App\Http\Controllers;

// use Sentinel;
use View;
// use Validator;
use Input;
// use Redirect;
// use Lang;
// use URL;
use App\Brand;

class BrandController extends ChandraController {
    public function getBrands() {
        // get all brands
        $brands = Brand::all();
        return View::make('admin/merck/brands/index', compact('brands'));
    }

    public function getCreate() {
        // Show the page
        return View::make('admin/merck/brands/create');
    }


    public function postCreate() {
        // create new brand in DB
        Brand::create(Input::all());
        return Redirect::route('brands')->with('success', 'New Brand Added');
    }

    public function showBrand($id) {
        // show brand info
        $brand = Brand::findOrFail($id);
        return View::make('admin/merck/brands/show', compact('brand'));
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