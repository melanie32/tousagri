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
	public function readQuestions()
	{	


		// instancier une classe pour lire toutes les catégories
		// affiche toutes les catégories
		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll();




		$selectQuestions = new QuestionsModel();

		$selectQ = $selectQuestions->findQuestions();



		$post = [];
		$errors = [];
		$success = false;

		if(!empty($_POST)) {

			$post = array_map('trim', array_map('strip_tags', $_POST));

			if(!v::notEmpty()->length(2, 20)->validate($post['username'])){
					$errors[] = 'Votre pseudo doit contenir entre 2 et 20 caractères';
			}

			if(!v::notEmpty()->length(2, 250)->validate($post['message'])){
					$errors[] = 'Votre message doit contenir entre 2 et 250 caractères';
			}

			if(count($errors) === 0) {

				$selectComments = new CommentsModel();

			$insertComments = $selectComments->insert([
				'id_question' => $selectQuestions['id'],
				'content' => $post['message'],
				'username_com' => $post['username'],
				]);
				if($insertComments) {
					$success = true;
				}
				else {
					$errors[] = 'Une erreur est survenue lors de l\'ajout de votre commentaire';
				}
			}
		}

		$params = [
			'errors' => $errors,
			'success' => $success,
		];





		// on peut mettre tous les résultats des functions dans ce data de mes couilles
		$data = [
			'selectC' => $selectC,
			'selectQ' => $selectQ,
			'params'  => $params,
		];

		$this->show('questions/questions', $data);
	}

}