<?php  
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/questions', 'AjaxQuestions#home', 'questions_home'],
		['GET', '/categories', 'Categories#category', 'categories_category'],




		// ROUTES POUR LE BACK avec le controller ADMIN
		['GET', '/admin/accueil', 'Admin#accueil', 'admin_accueil'],
		['GET', '/admin/categories', 'Admin#categories', 'admin_categories'],
		['GET|POST', '/admin/addCategories', 'Admin#addCategories', 'admin_add_categories'],
		['GET|POST', '/admin/editCategories', 'Admin#editCategories', 'admin_edit_categories'],
		['GET|POST', '/admin/editComments', 'Admin#editComments', 'admin_edit_comments'],
		['GET|POST', '/admin/', 'Users#login', 'admin_login'],
		['GET|POST', '/admin/addUsers', 'Users#addUsers', 'admin_users_add'],

	);