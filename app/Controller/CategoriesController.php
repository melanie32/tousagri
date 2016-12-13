<?php

namespace Controller;

use \W\Controller\Controller;

class CategoriesController extends Controller
{

	/**
	 * Page list sections (front)
	 * 
	 */
	public function category()
	{
		$this->show('categories/categories_category');
	}

}