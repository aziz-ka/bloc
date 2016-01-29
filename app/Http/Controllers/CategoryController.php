<?php namespace App\Http\Controllers;

// use Sentinel;
use View;
// use Validator;
use Input;
// use Redirect;
// use Lang;
// use URL;
use App\Category;

class CategoryController extends ChandraController {
    public function getCategories() {
        // get all categories
        $categories = Category::all();
        return View::make('admin/merck/categories/index', compact('categories'));
    }

    public function getCreate() {
        // Show the page
        return View::make('admin/merck/categories/create');
    }


    public function postCreate() {
        // create new category in DB
        Category::create(Input::all());
        return Redirect::route('categories')->with('success', 'New Category Added');
    }

    public function showCategory($id) {
        // show category info
        $category = Category::findOrFail($id);
        return View::make('admin/merck/categories/show', compact('category'));
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