<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CategoriesModel;


class CategoriesController extends Controller
{

	/**
	 * Page list sections (front)
	 * 
	 */
	public function category()
	{
		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll();

		$dataC = ['selectC' => $selectC];

		
		$this->show('categories/categories_category', $dataC);
	}

}