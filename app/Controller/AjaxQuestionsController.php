<?php
 
namespace Controller;

use \W\Controller\Controller;

// pour insérer les commentaires
use \Model\CommentsModel;

// sert à reprendre la jointure de table questions avec category
use \Model\QuestionssModel;

// utile pour lire les categories
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

		




		// pour insérer les commentaires on le fera avec showJson


		// affiche toutes les catégories
		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll();

		$dataC = ['selectC' => $selectC];

		$this->show('questions/questions', $dataC);
	}

}