<?php 
 
namespace Controller;

use \W\Controller\Controller;
use \Model\CategoriesModel;
use \Model\QuestionsModel;

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
		$this->show('admin/admin_accueil');
	}

	/**
	 * Page de liste des catégories du back office
	 * 
	 */

	public function categories()
	{

		$selectCategories = new CategoriesModel();

		$selectC = $selectCategories->findAll();

		$dataC = ['selectC' => $selectC];

		$this->show('admin/admin_categories', $dataC);
	}

	/**
	 * Page d'ajout catégories du back office
	 * 
	 */

	public function addCategories()
	{
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
				
				if(!v::notEmpty()->length(5, 500)->validate($post['question'][$i])) {
						$errors[] = 'La question doit comporter entre 5 et 150 caractères';
				}

				if(!v::notEmpty()->length(5, 10000)->validate($post['explanation'][$i])){
						$errors[] = 'La réponse doit comporter entre 5 et 10000 caractères';
				}

				
				if (!empty($_FILES['picture']['tmp_name'][$i])) {
				
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
					
					if(!empty($_FILES['picture']['tmp_name'][$i])) {

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
			if(!empty($_FILES['pictogram']['tmp_name'])) {

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
				
				if(!v::notEmpty()->length(5, 500)->validate($post['question'][$i])) {
						$errors[] = 'La question doit comporter entre 5 et 150 caractères';
				}

				if(!v::notEmpty()->length(5, 10000)->validate($post['explanation'][$i])){
						$errors[] = 'La réponse doit comporter entre 5 et 10000 caractères';
				}

				
				if (!empty($_FILES['picture']['tmp_name'][$i])) {
				
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
				if (!empty($_FILES['pictogram']['tmp_name'])) {
					
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
				if(!empty($_FILES['illustration']['tmp_name'])) {

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
				for ($i=0; $i < count($_FILES['picture']['tmp_name']) ; $i++) { 
					
					if(!empty($_FILES['picture']['tmp_name'][$i])) {

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
					'pictogram' => $pictoName,
					'illustration' => $illusName,
				];

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
	 * 
	 */

	public function editComments()
	{
		$this->show('admin/admin_edit_comments');
	}


}