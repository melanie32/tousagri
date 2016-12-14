<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;
use \W\Model\UsersModel;
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
		$comments = new CommentsModel();

		$errors = [];
		$post = [];

		if (!empty($_POST)) {
			$post = array_map('trim', array_map('strip-tags', $_POST));

			if(!v::notEmpty()->length(4,25)->validate($post['username'])){
				$errors[] = 'Votre pseudo doit contenir 4 à 25 caractères';
			}
			if(!v::notEmpty()->length(4,350)->validate($post['content'])){
				$errors[] = 'Votre message doit contenir 4 à 350 caractères';
			}

			// Renverra "true" si l'username existe déjà en base de donnée
			if($usersModel->usernameExists($post['username'])){
				$errors[] = 'Le pseudo est déjà utilisé';
			}

			if(count($errors) === 0){

			$selectQuestions = new QuestionsModel(); // J'instancie la Class qui permet de faire le lien avec la base de donnée

			$select = $selectQuestions->find($id);

				$dataInsert = [
					'id_question' 	=> $post['username'],
					'content'		=> $post['content'],
					'username_com'		=> $post['username'],
				];
				
				if($usersModel->insert($dataInsert)){
					$this->showJson(['code' => 'ok', 'msg' => 'Commentaire ajouté avec succès']);
				}
			}
		}



		$this->show('questions/questions');
	}

}