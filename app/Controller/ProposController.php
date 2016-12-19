<?php

namespace Controller;

use \W\Controller\Controller;

class ProposController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 * test commit
	 */
	public function home()
	{
		$this->show('propos/propos');
	}

}