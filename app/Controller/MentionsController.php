<?php

namespace Controller;

use \W\Controller\Controller;

class MentionsController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function home()
	{
		$this->show('mentions/mentions_mentions');
	}

}