<?php 
 
namespace Controller; 

use \W\Controller\Controller;
use \W\Security\AuthorizationModel;
use \W\Security\AuthentificationModel;
use \Model\CategoriesModel;
use \Model\QuestionsModel;
use \Model\CommentsModel;
use \Model\UsersModel;

use \Respect\Validation\Validator as v; 

use \Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{


	/**
	 * Le chemin pour la page de connexion du back office est dans le User controller
	 * 
	 */
	
	/**
	 * Page d'accueil du back office
	 * 
	 */
	public function accueil()
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }


		// sélection de la table Users
		$selectUsers = new UsersModel();

		$selectU = $selectUsers->findAll();

		$dataUser = [ 'selectU' => $selectU];



		$this->show('admin/admin_accueil', $dataUser);
	}

	/**
	 * Page de liste des catégories du back office
	 * 
	 */

	public function categories()
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		// sélection de toutes les catégories
		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll('title', 'ASC');

		$dataC = ['selectC' => $selectC];


		


		$this->show('admin/admin_categories', $dataC);
	}

	//fonction pour supprimer la catégorie et questions et commentaires qui s'y réfèrent

	public function deleteCategorie($id)
	{
		
		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		// sélection de la catégorie à supprimer
		$categoriesModel = new CategoriesModel();

		$selectC = $categoriesModel->find($id);

		// vérifications des input du formulaire

		if(!empty($_POST)) {

			if(isset($_POST['disconnect']) && $_POST['disconnect'] === 'yes') 
			{
			
				//supression des commentaires, des questions et de la catégorie lié à l'ID de la catégorie
			$commentsModel = new CommentsModel();
			$questionsModel = new QuestionsModel();

			$commentsModel->deleteCommentsIfDelCategory($id);

			$questionsModel->deleteQuestionsIfDelCategory($id);


			$categoriesModel->delete($id);

			$this->redirectToRoute('admin_categories');

			}

			elseif(isset($_POST['disconnect']) && $_POST['disconnect'] === 'no')
			{

				$this->redirectToRoute('admin_categories');
			}

		}

		$dataC = ['selectC' => $selectC];

		$this->show('admin/admin_delete_categorie', $dataC);


	}

	/**
	 * Suppression des questions en ajax dans admin edit categories
	 * 
	 */

	public function deleteQuestions()
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		if (!empty($_POST)) {
			$post['id'] = trim(strip_tags($_POST['id']));
		}
		
		$selectQuestion = new QuestionsModel();

		$selectOneQ = $selectQuestion->findQuestions($post['id']);
		$i = (int) $_POST['i'];

		$temq = unserialize($selectOneQ['question']);		
		$temq[$i] = '';
		$question = array_filter($temq);

		$temq = unserialize($selectOneQ['explanation']);		
		$temq[$i] = '';
		$explanation = array_filter($temq);

		$temq = unserialize($selectOneQ['picture']);		
		$temq[$i] = '';
		$picture = array_filter($temq);

		$temq = unserialize($selectOneQ['video']);		
		$temq[$i] = '';
		$video = array_filter($temq);


		$dataquestion = [
			'question'=> serialize($question),
			'explanation'=> serialize($explanation),
			'picture'=> serialize($picture),
			'video'=> serialize($video)
		];
		//var_dump( $post['id']);
		// On update pour l'id de la question
		if($selectQuestion->update($dataquestion , $selectOneQ['id'])){

			$json = [
				'code'=>'ok',
				'msg'=>'Question supprimée'
			];
		}
		else {
			$json = ['code'=>'error', 'msg'=>'Erreur lors de la suppression de la question'];
		}

		$this->showJson($json);

	}


	/**
	 * Page d'ajout catégories du back office
	 * 
	 */

	public function addCategories()
	{
		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		$post = [];
		$errors = [];
		$success = false;

		// préparation des dossiers pour l'upload de picto
		$folderUploadPicto = getApp()->getConfig('upload_dir_picto'); //permet d'indiquer via le fichier config le dossier destinataire de l'upload de picto

		$fullFolderUploadPicto = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'.$folderUploadPicto;




		// préparation des dossiers pour l'upload de l'illus
		$folderUploadIllus = getApp()->getConfig('upload_dir_illus'); //permet d'indiquer via le fichier config le dossier destinataire de l'upload de l'illus

		$fullFolderUploadIllus = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'.$folderUploadIllus;




		// préparation des dossiers pour l'upload des images illustrant la réponse à question
		$folderUploadPicture = getApp()->getConfig('upload_dir_imgreply'); //permet d'indiquer via le fichier config le dossier destinataire de l'upload de l'image illustrant les réponses des questions

		$fullFolderUploadPicture = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'.$folderUploadPicture;
		

		if(!empty($_POST)) {
			
			foreach ($_POST as $key => $value) {
				
				if(!is_array($value)){
					$post[$key] = trim(strip_tags($value));
				}
				else {
					$post[$key] = array_map('trim', array_map('strip_tags', $value));
				}
			}
			

			if(!v::notEmpty()->length(2, 50)->validate($post['title'])){
					$errors[] = 'Le titre de la catégorie doit comporter entre 2 et 50 caractères';
			}

			// validation du mime type des images

			// validation du pictogramme
			

				if(!v::image()->validate($_FILES['pictogram']['tmp_name'])){
						$errors[] = 'Le fichier envoyé pour le pictogramme n\'est pas une image valide';
				}
				// Valide la taille du pictogramme
				if(!v::size(null, '2MB')->validate($_FILES['pictogram']['tmp_name'])){
					$errors[] = 'La taille de votre pictogramme doit être inférieur à 2MB';
				}
					// Vérifie que le pictogramme a bien été uploadé
				if(!v::uploaded()->validate($_FILES['pictogram']['tmp_name'])){
					$errors[] = 'Une erreur est survenue lors de l\'upload du pictogramme';
				}
			



			// validation de l'illustration
			

				if(!v::image()->validate($_FILES['illustration']['tmp_name'])){
						$errors[] = 'Le fichier envoyé pour l\'illustration n\'est pas une image valide';
				}
				// Valide la taille de l'illustration
				if(!v::size(null, '2MB')->validate($_FILES['illustration']['tmp_name'])){
					$errors[] = 'La taille de votre illustration doit être inférieur à 2MB';
				}
					// Vérifie que l'illustration a bien été uploadé
				if(!v::uploaded()->validate($_FILES['illustration']['tmp_name'])){
					$errors[] = 'Une erreur est survenue lors de l\'upload de l\'illustration';
				}
			

			// le plus simple, une boucle qui permet d'incrémenter les numéro à côté des name html
			for ($i=0; $i < count($post['question']); $i++) { 
				
				if(!v::notEmpty()->length(5, 150)->validate($post['question'][$i])) {
						$errors[] = 'La question doit comporter entre 5 et 150 caractères';
				}

				if(!v::notEmpty()->length(5, 10000)->validate($post['explanation'][$i])){
						$errors[] = 'La réponse doit comporter entre 5 et 10000 caractères';
				}

				
				if (!empty($_FILES['picture']['name'][$i])) {
				
					// validation de l'image contenue dans le texte de réponse
					if(!v::image()->validate($_FILES['picture']['tmp_name'][$i])){
							$errors[] = 'Le fichier envoyé pour l\'image illustant la question n\'est pas une image valide';
					}
					// Valide la taille de l'image contenue dans le texte de réponse
					if(!v::size(null, '2MB')->validate($_FILES['picture']['tmp_name'][$i])){
						$errors[] = 'La taille de votre image illustant la question doit être inférieur à 2MB';
					}
						// Vérifie que l'image contenue dans le texte de réponse a bien été uploadé
					if(!v::uploaded()->validate($_FILES['picture']['tmp_name'][$i])){
						$errors[] = 'Une erreur est survenue lors de l\'upload de l\'image illustant la question';
					}
					
				}
			
				if (!empty($post['video'][$i])) {

					if(!v::url()->validate($post['video'][$i])) {
						$errors[$i] = 'l\'URL de la vidéo Youtube29 n\'est pas valide'.$i;
					}
				}
				

			}

			if(count($errors) === 0) {

				// dossier des pictos => /public/assets/img/pictos
				// créer le dossier pictos si inexistant

				if(!is_dir($fullFolderUploadPicto)){
					mkdir($fullFolderUploadPicto, 0755);
				}
				
					
					$picto = Image::make($_FILES['pictogram']['tmp_name']);

					// On définit l'extension de l'image en fonction de son mimeType
					switch($picto->mime()){
							case 'image/jpg':
							case 'image/jpeg':
								$extension = '.jpg';
							break;
							case 'image/png':
								$extension = '.png';
							break;
							case 'image/gif':
								$extension = '.gif';
							break;

					}

					// Le nom du picto + son extension
					$pictoName = uniqid('picto_').$extension;

					// On sauvegarde l'image 
					$picto->save($fullFolderUploadPicto.$pictoName);
				
				



				// dossier des illustrations => /public/assets/img/illustrations
				// créer le dossier illustrations si inexistant

				if(!is_dir($fullFolderUploadIllus)){
					mkdir($fullFolderUploadIllus, 0755);
				}
				

					$illus = Image::make($_FILES['illustration']['tmp_name']);

					// On définit l'extension de l'image en fonction de son mimeType
					switch($illus->mime()){
							case 'image/jpg':
							case 'image/jpeg':
								$extension = '.jpg';
							break;
							case 'image/png':
								$extension = '.png';
							break;
							case 'image/gif':
								$extension = '.gif';
							break;

					}

					// Le nom de l'illus + son extension
					$illusName = uniqid('illus_').$extension;

					// On sauvegarde l'illus 
					$illus->save($fullFolderUploadIllus.$illusName);
				
				



				// dossier des image contenue dans la réponse => /public/assets/img/imgreply
				// créer le dossier imgreply si inexistant

				if(!is_dir($fullFolderUploadPicture)){
					mkdir($fullFolderUploadPicture, 0755);
				}
				for ($i=0; $i < count($_FILES['picture']['tmp_name']) ; $i++) { 
					
					if(!empty($_FILES['picture']['name'][$i])) {

						$picture = Image::make($_FILES['picture']['tmp_name'][$i]);

						// On définit l'extension de l'image en fonction de son mimeType
						switch($picture->mime()){
								case 'image/jpg':
								case 'image/jpeg':
									$extension = '.jpg';
								break;
								case 'image/png':
									$extension = '.png';
								break;
								case 'image/gif':
									$extension = '.gif';
								break;

						}

						// Le nom du picto + son extension
						$pictureName[$i] = uniqid('picture_').$extension;

						// On sauvegarde l'image 
						$picture->save($fullFolderUploadPicture.$pictureName[$i]);
					}
					else {
						$pictureName[$i] = "";
					}

				} // end of for pour upload de la picture illustrant la réponse

				$insertCategories = new CategoriesModel();

				$dataInsert =[
					'title' => $post['title'],
					'pictogram' => $pictoName,
					'illustration' => $illusName,
				];

				$insertC = $insertCategories->insert($dataInsert);

				if($insertC) {
					// si première insert est faite, on fait la deuxième dans la table questions

					$insertQuestions = new QuestionsModel();

					$dataInsertQ = [
						'id_category' => $insertC['id'],
						'question' => serialize($post['question']), 
						'explanation' => serialize($post['explanation']),
						'picture' => serialize($pictureName),
						'video' => serialize($post['video']),

					];

					$insertQ = $insertQuestions->insert($dataInsertQ);

					if($insertQ) {
						$success = true;
					}
					else {
						$errors[] = 'Erreur lors de l\'ajout des questions en base de données';
					}			

				} // fin de if première update fait dans categories

				else {
					$errors[] = 'Erreur lors de l\'ajout total en base de données';
				}

			} // end of count errors

		} // end of empty post

		$dataInsert = [
			'errors' => $errors,
			'success' => $success,
		];

		$this->show('admin/admin_add_categories', $dataInsert);

	} // end function addcategories

	/**
	 * Page  modifier catégories du back office
	 * 
	 */

	public function editCategories($id)
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		// appel des fonctions natives pour lire une seule categorie dans la page modifier les categories
		$selectCategory = new CategoriesModel();

		$selectOneC = $selectCategory->find($id);


		// appel des fonctions natives et class pour lire les questions qui sont liés à la table catégorie pour la page modifier les catégories

		$selectQuestion = new QuestionsModel();

		$selectOneQ = $selectQuestion->findQuestions($id);

		

		//update des données dans la bdd questions

		// étapes: verification du formulaire
		// puis insertion dans la bdd questions

		$post = [];
		$errors = [];
		$success = false;
		$pictoUpdate = false;
		$illuUpdate = false ;

		// préparation des dossiers pour l'upload de picto
		$folderUploadPicto = getApp()->getConfig('upload_dir_picto'); //permet d'indiquer via le fichier config le dossier destinataire de l'upload de picto

		$fullFolderUploadPicto = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'.$folderUploadPicto;




		// préparation des dossiers pour l'upload de l'illus
		$folderUploadIllus = getApp()->getConfig('upload_dir_illus'); //permet d'indiquer via le fichier config le dossier destinataire de l'upload de l'illus

		$fullFolderUploadIllus = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'.$folderUploadIllus;




		// préparation des dossiers pour l'upload des images illustrant la réponse à question
		$folderUploadPicture = getApp()->getConfig('upload_dir_imgreply'); //permet d'indiquer via le fichier config le dossier destinataire de l'upload de l'image illustrant les réponses des questions

		$fullFolderUploadPicture = $_SERVER['DOCUMENT_ROOT'].$_SERVER['W_BASE'].'/assets/img/'.$folderUploadPicture;
		

		if(!empty($_POST)) {
			
			foreach ($_POST as $key => $value) {
				
				if(!is_array($value)){
					$post[$key] = trim(strip_tags($value));
				}
				else {
					$post[$key] = array_map('trim', array_map('strip_tags', $value));
				}
			}
			

			if(!v::notEmpty()->length(2, 50)->validate($post['title'])){
					$errors[] = 'Le titre de la catégorie doit comporter entre 2 et 50 caractères';
			}

			// validation du mime type des images

			// validation du pictogramme
			if(!empty($_FILES['pictogram']['name'])) {

				$pictoUpdate = true ;

				if(!v::image()->validate($_FILES['pictogram']['tmp_name'])){
						$errors[] = 'Le fichier envoyé pour le pictogramme n\'est pas une image valide';
				}
				// Valide la taille du pictogramme
				if(!v::size(null, '2MB')->validate($_FILES['pictogram']['tmp_name'])){
					$errors[] = 'La taille de votre pictogramme doit être inférieur à 2MB';
				}
					// Vérifie que le pictogramme a bien été uploadé
				if(!v::uploaded()->validate($_FILES['pictogram']['tmp_name'])){
					$errors[] = 'Une erreur est survenue lors de l\'upload du pictogramme';
				}
			}



			// validation de l'illustration
			if(!empty($_FILES['illustration']['tmp_name'])) {

				$illuUpdate = true ;

				if(!v::image()->validate($_FILES['illustration']['tmp_name'])){
						$errors[] = 'Le fichier envoyé pour l\'illustration n\'est pas une image valide';
				}
				// Valide la taille de l'illustration
				if(!v::size(null, '2MB')->validate($_FILES['illustration']['tmp_name'])){
					$errors[] = 'La taille de votre illustration doit être inférieur à 2MB';
				}
					// Vérifie que l'illustration a bien été uploadé
				if(!v::uploaded()->validate($_FILES['illustration']['tmp_name'])){
					$errors[] = 'Une erreur est survenue lors de l\'upload de l\'illustration';
				}
			}

			// le plus simple, une boucle qui permet d'incrémenter les numéro à côté des name html
			for ($i=0; $i < count($post['question']); $i++) { 
				
				if(!v::notEmpty()->length(5, 150)->validate($post['question'][$i])) {
						$errors[] = 'La question doit comporter entre 5 et 150 caractères';
				}

				if(!v::notEmpty()->length(5, 10000)->validate($post['explanation'][$i])){
						$errors[] = 'La réponse doit comporter entre 5 et 10000 caractères';
				}

				
				if (!empty($_FILES['picture']['name'][$i])) {
				
					// validation de l'image contenue dans le texte de réponse
					if(!v::image()->validate($_FILES['picture']['tmp_name'][$i])){
							$errors[] = 'Le fichier26 envoyé pour l\'image illustant la question n\'est pas une image valide';
					}
					// Valide la taille de l'image contenue dans le texte de réponse
					if(!v::size(null, '2MB')->validate($_FILES['picture']['tmp_name'][$i])){
						$errors[] = 'La taille27 de votre image illustant la question doit être inférieur à 2MB';
					}
						// Vérifie que l'image contenue dans le texte de réponse a bien été uploadé
					if(!v::uploaded()->validate($_FILES['picture']['tmp_name'][$i])){
						$errors[] = 'Une erreur28 est survenue lors de l\'upload de l\'image illustant la question';
					}
					
				}
			
				if (!empty($post['video'][$i])) {

					if(!v::url()->validate($post['video'][$i])) {
						$errors[$i] = 'l\'URL de la vidéo Youtube29 n\'est pas valide'.$i;
					}
				}
				

			}

			if(count($errors) === 0) {

				// dossier des pictos => /public/assets/img/pictos
				// créer le dossier pictos si inexistant

				if(!is_dir($fullFolderUploadPicto)){
					mkdir($fullFolderUploadPicto, 0755);
				}

				if (!empty($_FILES['pictogram']['name'])) {
					
					$picto = Image::make($_FILES['pictogram']['tmp_name']);

					// On définit l'extension de l'image en fonction de son mimeType
					switch($picto->mime()){
							case 'image/jpg':
							case 'image/jpeg':
								$extension = '.jpg';
							break;
							case 'image/png':
								$extension = '.png';
							break;
							case 'image/gif':
								$extension = '.gif';
							break;

					}

					// Le nom du picto + son extension
					$pictoName = uniqid('picto_').$extension;

					// On sauvegarde l'image 
					$picto->save($fullFolderUploadPicto.$pictoName);
				}
				else {
					$pictoName = "";
				}



				// dossier des illustrations => /public/assets/img/illustrations
				// créer le dossier illustrations si inexistant

				if(!is_dir($fullFolderUploadIllus)){
					mkdir($fullFolderUploadIllus, 0755);
				}
				if(!empty($_FILES['illustration']['name'])) {

					$illus = Image::make($_FILES['illustration']['tmp_name']);

					// On définit l'extension de l'image en fonction de son mimeType
					switch($illus->mime()){
							case 'image/jpg':
							case 'image/jpeg':
								$extension = '.jpg';
							break;
							case 'image/png':
								$extension = '.png';
							break;
							case 'image/gif':
								$extension = '.gif';
							break;

					}

					// Le nom de l'illus + son extension
					$illusName = uniqid('illus_').$extension;

					// On sauvegarde l'illus 
					$illus->save($fullFolderUploadIllus.$illusName);
				}
				else {
					$illusName = "";
				}


				// dossier des image contenue dans la réponse => /public/assets/img/imgreply
				// créer le dossier imgreply si inexistant

				if(!is_dir($fullFolderUploadPicture)){
					mkdir($fullFolderUploadPicture, 0755);
				}
				for ($i=0; $i < count($_FILES['picture']['name']) ; $i++) { 
					
					if(!empty($_FILES['picture']['name'][$i])) {

						$picture = Image::make($_FILES['picture']['tmp_name'][$i]);

						// On définit l'extension de l'image en fonction de son mimeType
						switch($picture->mime()){
								case 'image/jpg':
								case 'image/jpeg':
									$extension = '.jpg';
								break;
								case 'image/png':
									$extension = '.png';
								break;
								case 'image/gif':
									$extension = '.gif';
								break;

						}

						// Le nom du picto + son extension
						$pictureName[$i] = uniqid('picture_').$extension;

						// On sauvegarde l'image 
						$picture->save($fullFolderUploadPicture.$pictureName[$i]);
					}
					else {
						$pictureName[$i] = "";
					}

				} // end of for pour upload de la picture illustrant la réponse

				$updateCategories = new CategoriesModel();

				$dataUpdate =[
					'title' => $post['title'],
				];

				if ($pictoUpdate) {
					$dataUpdate['pictogram'] = $pictoName ;
				}

				if ($illuUpdate) {
					$dataUpdate['illustration'] = $illusName ;
				}
				
				$updateC = $updateCategories->update($dataUpdate, $post['id-category']);

				if($updateC) {
					// si première update est faite, on fait la deuxième dans la table questions

					$updateQuestions = new QuestionsModel();

					$dataUpdateQ = [
						'id_category' => $post['id-category'],
						'question' => serialize($post['question']), 
						'explanation' => serialize($post['explanation']),
						'picture' => serialize($pictureName),
						'video' => serialize($post['video']),

					];

					$updateQ = $updateQuestions->update($dataUpdateQ, $post['id-question']);

					if($updateQ) {
						$success = true;
					}
					else {
						$errors[] = 'Erreur lors de l\'ajout des questions en base de données';
					}			

				} // fin de if première update fait dans categories

				else {
					$errors[] = 'Erreur lors de l\'ajout total en base de données';
				}

			} // end of count errors

		} // end of empty post

		$dataEdit = [
			'selectOneC' => $selectOneC,
			'selectOneQ' => $selectOneQ,
			'errors' => $errors,
			'success' => $success,
		];

		$this->show('admin/admin_edit_categories', $dataEdit);
	}

	/**
	 * Page  gestion des commentaires  du back office
	 * uniquement pour le 1er affichage lorsqu'on arrive sur la page 
	 */

	public function editComments()
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		// sélection de toutes les catégories pour pouvoir sélectionner les comm en fonction
		$selectCategory = new CategoriesModel();
		$selectOneC = $selectCategory->findAll('title', 'ASC');
		
		//sélection des commentaires enregistrés dans la bdd pour affichage seulement ceux qui sont à valider		
		$selectComment = new CommentsModel();

		$selectCommentV = $selectComment->selectCommentsAndCategoryByVal('non');
	

		// sélection des commentaires qui sont déjà validés
		$selectCommentOk = $selectComment->selectCommentsAndCategoryByVal('oui');

		$dataComments = [
			'selectCommentV' => $selectCommentV,
			'selectCommentOk' => $selectCommentOk,	
			'selectOneC' => $selectOneC,
				
		];

		$this->show('admin/admin_edit_comments', $dataComments);
	}

	public function editNewComments() 
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		if (!empty($_POST)) {
			$post['id'] = trim(strip_tags($_POST['id']));
		}

		$commentsModel = new CommentsModel();

		$selectCommentV = $commentsModel->selectCommentsAndCategoryByVal('non');	


		// sélection des commentaires qui sont déjà validés
		$selectCommentOk = $commentsModel->selectCommentsAndCategoryByVal('oui');


		if($commentsModel->update(['validate' => 'oui'], $post['id']))
			{
				$this->showJson(
					[
					'selectCommentOk' => $selectCommentOk,
					'selectCommentV' => $selectCommentV,
					'code'=>'ok',
					 'msg'=>'Commentaire validé'
					 ]);
			}
		
			else {
				
				$this->showJson(['code'=>'error', 'msg'=>'Erreur lors de la validation du commentaire']);
			}		

	}

	public function deleteComments() 
	{
		
		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		if (!empty($_POST)) {
			$post['id'] = trim(strip_tags($_POST['id']));
		}

		$deleteComments = new CommentsModel();

		if($deleteComments->delete($post['id'])){

			$this->showJson([
				'code'=>'ok',
				'msg'=>'Commentaire supprimé'
			]);
		}
		else {
			$this->showJson(['code'=>'error', 'msg'=>'Erreur lors de la suppression du commentaire']);
		}
	}

	public function selectComments() 
	{

		$authorizationModel = new AuthorizationModel();
		$authentificationModel = new AuthentificationModel();

        if (!$authentificationModel->getLoggedUser()) {

            $this->redirectToRoute('login');
        }

		$html = null;


		if (!empty($_POST)) {
			$post['id'] = trim(strip_tags($_POST['id']));
		}


		$commentsModel = new CommentsModel();

		$selectCombyCateg = $commentsModel->selectCommentsByCategory('oui', $post['id']);
		if($selectCombyCateg){
			foreach ($selectCombyCateg as $selectCom) {
				$html.= '<tr class="text-center">';		
				$html.= '<td>'.ucfirst(strtolower($selectCom['title'])).'</td>';
				$html.= '<td>'.$selectCom['username'].'</td>';
				$html.= '<td>'.utf8_encode($selectCom['content']).'</td>';
				$html.= '</tr>';
			}

		}
		else {
				$html.= '<tr class="text-center" rowspan="15">';		
				$html.= '<td>Aucun commentaire</td>';
				$html.= '</tr>';

		}
		$this->showJson([
			'html'=> $html,
		]);
		
	}

	

}