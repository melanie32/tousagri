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

			$post[$key] = array_map('trim', array_map('strip_tags', $value));

			if(!v::notEmpty()->length(2, 50)->validate($post['username'])){
				$errors[] = 'Votre pseudo doit comporter entre 2 et 50 caractères';
			}

			if(!v::notEmpty()->length(2, 500)->validate($post['username'])){
				$errors[] = 'Votre commentaire doit comporter entre 2 et 500 caractères';
			}


		} // end of empty post






		$this->show('commentaires/commentaires_commentaires');
	}

}