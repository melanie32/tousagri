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
		$this->show('commentaires/commentaires_commentaires');
	}

}