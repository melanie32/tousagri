<?php

namespace Controller;

use \W\Controller\Controller;

class CommentairesController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function home()
	{
		$this->show('commentaires/commentaires_home');
	}

}