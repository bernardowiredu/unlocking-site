<?php


class BlogController extends BaseController {



	public function getIndex(){

		return View::make('blog.index');

	}
}