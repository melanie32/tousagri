<?php
 
namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel;
use \W\Security\AuthentificationModel;

use \Respect\Validation\Validator as v;

class UsersController extends Controller
{

	/**
	 * Page d'ajout d'un admin du back office
	 * 
	 */
	public function addUsers()
	{

		$post = [];
		$errors = [];
		$success = [];

		if(!empty($_POST)) {

			$post = array_map('trim', array_map('strip_tags',  $_POST));

			if(!v::notEmpty()->length(3, 30)->validate($post['username'])){
				$errors[] = 'Votre Pseudo doit comporter entre 3 et 30 caractères';
			}

			if(!v::email()->validate($post['email'])){
				$errors[] = 'L\'Email que vous venez de taper est incorrect';
			}

			if(!v::notEmpty()->length(3, 30)->validate($post['password'])){
				$errors[] = 'Votre Mot de passe doit comporter entre 3 et 30 caractères';
			}

			if(count($errors) === 0) {

				$usersModel = new UsersModel();

				$authModel = new AuthentificationModel();

				$insertUsers = $usersModel->insert([
						'username' => $post['username'],
						'email'    => $post['email'],
						'password'  => $authModel->hashPassword($post['password']),
					]);

				if($insertUsers) {
					$success = true;
				}
				else {
					$errors[] = 'Erreur lors de votre ajout d\'utilisateur';
				}

			} // end of if count errors

		} // end of if $_POST empty

		$params = [
			'errors'  => $errors,
			'success' => $success,
		];

		$this->show('users/users_add', $params);
	}
}