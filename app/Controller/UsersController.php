<?php
 
namespace Controller;

use \W\Controller\Controller;

class UsersController extends Controller
{

	/**
	 * Page d'ajout d'un admin du back office
	 * 
	 */
	public function addUsers()
	{
		$this->show('users/users_add');
	}
}