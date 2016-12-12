<?php
	// et là ca prend encompte
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		['GET', '/questions', 'Questions#home', 'questions_home'],




		// ROUTES POUR LE BACK avec le controller ADMIN
		['GET|POST', '/admin', 'Admin#home', 'admin_home'],
		['GET', '/admin/accueil', 'Admin#accueil', 'admin_accueil'],
		['GET', '/admin/categories', 'Admin#categories', 'admin_categories'],

	);