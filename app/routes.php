<?php  
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/questions/[i:id]', 'Questions#questions', 'questions_questions'],
		['GET|POST', '/commentaires/[i:id]', 'Commentaires#commentaires', 'commentaires_commentaires'],
		['GET', '/mentions', 'Mentions#home', 'mentions_mentions'],
		['GET', '/propos', 'Propos#home', 'propos_propos'],
		['GET', '/categories', 'Categories#category', 'categories_category'],




		// ROUTES POUR LE BACK avec le controller ADMIN
		['GET', '/admin/accueil', 'Admin#accueil', 'admin_accueil'],
		['GET', '/admin/categories', 'Admin#categories', 'admin_categories'],
		['GET|POST', '/admin/addCategories', 'Admin#addCategories', 'admin_add_categories'],
		['GET|POST', '/admin/editCategories/[i:id]', 'Admin#editCategories', 'admin_edit_categories'],
		['GET|POST', '/admin/deleteCategorie/[i:id]', 'Admin#deleteCategorie', 'admin_delete_categorie'],
		['GET|POST', '/ajax/deleteQuestions', 'Admin#deleteQuestions', 'admin_del_questions'],
		// routes pour éditer, répondre ou supprimer les commentaires
		['GET|POST', '/admin/editComments', 'Admin#editComments', 'admin_edit_comments'],
		['GET|POST', '/ajax/editComments', 'Admin#editNewComments', 'admin_edit_new_comments'],
		['GET|POST', '/ajax/deleteComments', 'Admin#deleteComments', 'admin_edit_del_comments'],
		['GET|POST', '/ajax/selectComments', 'Admin#selectComments', 'admin_edit_sel_comments'],
		// routes pour gérer les login, logout et add users
		['GET|POST', '/admin/', 'Users#login', 'login'],
		['GET|POST', '/admin/logout', 'Users#logOut', 'admin_logout'],
		['GET|POST', '/admin/addUsers', 'Users#addUsers', 'admin_users_add'],
		

	);