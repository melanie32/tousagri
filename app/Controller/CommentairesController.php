<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;
use \Model\CategoriesModel;

class CommentairesController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function commentaires($id)
	{
		// sélection de la catégorie pour pouvoir insérer id-category dans la base comments
		$selectCategory = new CategoriesModel();

		$selectOneC = $selectCategory->find($id);


		// insertion des commentaires dans la base comments
		$post = [];
		$errors = [];
		$success = false;

		if(!empty($_POST)) {

			$post[$key] = array_map('trim', array_map('strip_tags', $value));

			if(!v::notEmpty()->length(2, 50)->validate($post['username'])){
				$errors[] = 'Votre pseudo doit comporter entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->length(2, 500)->validate($post['comment'])){
				$errors[] = 'Votre commentaire doit comporter entre 2 et 500 caractères';
			}

			if(count($errors) === 0) {

				$insertComments = new CommentsModel();

				$dataInsertCo = [
					'id_category' => $post['id-category'],
					'content' => $post['username'],
					'username_com' => $post['content'],

				];

				$insertCo = $insertComments->insert($dataInsertCo);

				if($insertCo) {
					$success = true;
				}
				else {
					$errors[] = 'Erreur lors de l\'ajout des commentaires en base de données';
				}

			} // end of count errors

		} // end of empty post


		//sélection des commentaires enregistrés dans la bdd pour affichage
		$selectComments = new CommentsModel();

		$selectOneCom = $selectComments->findAll();



		$dataInsertComments = [
			'errors' => $errors,
			'success' => $success,
			'$selectOneCom' => $selectOneCom,
		];		



		$this->show('commentaires/commentaires_commentaires', $dataInsertComments);
	
	} // end of function commentaires

}