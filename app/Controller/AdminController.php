<?php
 
namespace Controller;

use \W\Controller\Controller;

class AdminController extends Controller
{

	/**
	 * Page de connexion du back office
	 * 
	 */
	public function home()
	{
		$this->show('admin/admin_home');
	}

	/**
	 * Page d'accueil du back office
	 * 
	 */
	public function accueil()
	{
		$this->show('admin/admin_accueil');
	}

	/**
	 * Page de liste des catégories du back office
	 * 
	 */

	public function categories()
	{
		$this->show('admin/admin_categories');
	}

	/**
	 * Page d'ajout catégories du back office
	 * 
	 */

	public function addCategories()
	{
		$this->show('admin/admin_add_categories');
	}

	/**
	 * Page  modifier catégories du back office
	 * 
	 */

	public function editCategories()
	{
		$this->show('admin/admin_edit_categories');
	}

	/**
	 * Page  gestion des commentaires  du back office
	 * 
	 */

	public function editComments()
	{
		$this->show('admin/admin_edit_comments');
	}


}