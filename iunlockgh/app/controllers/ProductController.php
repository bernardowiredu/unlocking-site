<?php


class ProductController extends BaseController {

	public function getIndex() {

		return View::make('products.index');
	}


	public function getAllProducts(){

		$products = Product::paginate(20);

		return View::make('admin.phones')->with('products', $products);

	}

	public function getProduct($id) {


		
		$phones = Product::find($id);
		if($id <= 9) {
		$countrys = Country::where('category_id','=','1')->get();
		$networks = Network::where('category_id','=','1')->get();
		
		}
		elseif($id <= 12) {
		$countrys = Country::where('category_id','=','2')->get();
		$networks = Network::where('category_id','=','2')->get();		
		}		
		elseif($id <= 15) {
		$countrys = Country::where('category_id','=','3')->get();;
		$networks = Network::where('category_id','=','3')->get();		
		}
		return View::make('products.product')->with('phones', $phones)->with('networks', $networks)->with('countrys', $countrys);
	}


	public function getSearch(){

		return View::make('search.index');
	}


	



	public function getAllPro(){

		return View::make('admin.add-products');
	}


	public function postCreate() {
		$posted = Input::all();

		$product = new Product;

		$product->product_name = $posted['product_name'];
		$product->category_id = $posted['category_id'];
		$product->description = $posted['description'];

		$product->save();

		return Redirect::back()->with('success', 'Product has been successfully created');
	}

		public function getProductSearch(){

		$keyword = Input::get('keyword');
		$results = Product::where('product_name', 'LIKE', '%'.$keyword.'%')->get();
		return View::make('search.index')->with('products', Product::where('product_name', 'LIKE', '%'.$keyword.'%')->get())
		->with('results', $results)->with('keyword',$keyword);
	}
}  