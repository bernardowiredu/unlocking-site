<?php

class CategoryController extends BaseController {


	public function postCreate() {

		$posted = Input::all();


		$category = new Category;
		$category->name = $posted['name'];

		$category->save();

		return Redirect::back()->with('success', 'New category has been created');
	}

	

	public function getProducts($id){

		$category = Category::find($id);
		$network = Network::where('category_id','=',$id)->get();
		$product = Product::where('category_id','=',$id)->paginate(9);
		$phone = Product::where('category_id','=',$id)->get();
		return View::make('products.index')->with('category', $category)->with('network',$network)
		->with('product',$product)->with('phone', $phone);
	}





	public function getCategory(){

		$categorys = Category::all();
		$countrys = Country::all();
		return View::make('admin.categorys')->with('categorys',$categorys)->with('countrys', $countrys);
	}



}