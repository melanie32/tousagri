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

	public function categories()
	{
		$this->show('admin/admin_categories');
	}

	public function addCategories()
	{
		$this->show('admin/admin_add_categories');
	}

	public function editCategories()
	{
		$this->show('admin/admin_edit_categories');
	}


}