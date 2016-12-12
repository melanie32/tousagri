<?php
	// et là ca prend encompte
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],



		// ROUTES POUR LE BACK avec le controller ADMIN
		['GET|POST', '/admin', 'Admin#home', 'admin_home'],
		['GET', '/admin/accueil', 'Admin#accueil', 'admin_accueil'],
	);