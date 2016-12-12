<?php

namespace Controller;

use \W\Controller\Controller;

class QuestionsController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function home()
	{
		$this->show('questions/questions');
	}

}