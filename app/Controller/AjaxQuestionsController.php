<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;
use \W\Model\UsersModel;
use \Model\CategoriesModel;

// Si on utilise "respect/validation". Ne pas oublier de l'ajouter via composer
use \Respect\Validation\Validator as v; 

class AjaxQuestionsController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function home()
	{	
		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll();

		$dataC = ['selectC' => $selectC];

		$this->show('questions/questions', $dataC);
	}

}