<?php
 
namespace Controller;

use \W\Controller\Controller;

// pour insérer les commentaires
use \Model\CommentsModel;

// sert à reprendre la jointure de table questions avec category
use \Model\QuestionsModel;

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

		// instancier une classe pour lire toutes les catégories
		// affiche toutes les catégories
		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll();




		//instancier la classe Questions 
		$selectQuestions = new QuestionsModel();

		$selectQ = $selectQuestions->findQuestions();




		// pour insérer les commentaires on le fera avec showJson




		// on peut mettre tous les résultats des functions dans ce data de mes couilles
		$data = [
			'selectC' => $selectC,
			'selectQ' => $selectQ,
		];

		$this->show('questions/questions', $data);
	}

}