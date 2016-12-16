<?php

namespace Controller;

use \W\Controller\Controller;

class CommentairesController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function commentaires()
	{
		$post = [];
		$errors = [];
		$success = false;

		if(!empty($_POST)) {

			$post[$key] = array_map('trim', array_map('strip_tags', $value);

			if(!v::notEmpty()->length(2, 50)->validate($post['username'])){
				$errors[] = 'Le titre de la catégorie doit comporter entre 2 et 50 caractères';
			}


		} // end of empty post






		$this->show('commentaires/commentaires_commentaires');
	}

}