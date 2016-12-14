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

			$post = array_map('trim', array_map('strip_tags', $_POST));

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
					$errors[] = 'Le fichier envoyé pour le pictogramme n\'est pas une image valide';
			}
			// Valide la taille de l'illustration
			if(!v::size(null, '2MB')->validate($_FILES['illustration']['tmp_name'])){
				$errors[] = 'La taille de votre pictogramme doit être inférieur à 2MB';
			}
				// Vérifie que l'illustration a bien été uploadé
			if(!v::uploaded()->validate($_FILES['illustration']['tmp_name'])){
				$errors[] = 'Une erreur est survenue lors de l\'upload du pictogramme';
			}



			if(!v::notEmpty()->length(5, 150)->validate($post['question'])){
					$errors[] = 'La question doit comporter entre 5 et 150 caractères';
			}

			if(!v::notEmpty()->length(5, 10000)->validate($post['explanation'])){
					$errors[] = 'La réponse doit comporter entre 5 et 10000 caractères';
			}



			// validation de l'image contenue dans le texte de réponse
			if(!v::image()->validate($_FILES['picture']['tmp_name'])){
					$errors[] = 'Le fichier envoyé pour l\'image illustant la question n\'est pas une image valide';
			}
			// Valide la taille de l'image contenue dans le texte de réponse
			if(!v::size(null, '2MB')->validate($_FILES['picture']['tmp_name'])){
				$errors[] = 'La taille de votre image illustant la question doit être inférieur à 2MB';
			}
				// Vérifie que l'image contenue dans le texte de réponse a bien été uploadé
			if(!v::uploaded()->validate($_FILES['picture']['tmp_name'])){
				$errors[] = 'Une erreur est survenue lors de l\'upload de l\'image illustant la question';
			}

			if(!v::url()->validate($post['video'])) {
				$errors[] = 'l\'URL de la vidéo Youtube n\'est pas valide';
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
				$pictoName = uniqid('art_').$extension;

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
				$illusName = uniqid('art_').$extension;

				// On sauvegarde l'illus 
				$illus->save($fullFolderUploadIllus.$illusName);



				// dossier des image contenue dans la réponse => /public/assets/img/imgreply
				// créer le dossier imgreply si inexistant

				if(!is_dir($fullFolderUploadPicture)){
					mkdir($fullFolderUploadPicture, 0755);
				}

				$picture = Image::make($_FILES['picture']['tmp_name']);

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
				$pictureName = uniqid('art_').$extension;

				// On sauvegarde l'image 
				$picture->save($fullFolderUploadPicture.$pictureName);




				// on instancie le modèle pour communiquer avec la bdd
				// le modèle categories pour faire le lien avec la table categories
				// insertion du titre, du picto et de l'illus
				$categoriesModel = new CategoriesModel();
				
				$insertCategories = $categoriesModel->insert([
					'title' => $post['title'],
					'pictogram' => $pictoName,
					'illustration' => $illusName,
				]);

				if($insertCategories) {

					// si l'insertion dans la table categories a été effectué alors on insère dans la table questions le reste des données du formulaire

					// on instancie le modèle pour communiquer avec la bdd
					// le modèle questions pour faire le lien avec la table questions
					// insertion de la question, explanation, video et picture

					$questionsModel = new QuestionsModel();

					$insertQuestions = $questionsModel->insert([
						'id_category' => $insertCategories['id'],
						'question' => $post['question'],
						'explanation' => $post['explanation'],
						'picture' => $pictureName,
						'video' => $post['video'],
					]);

					if($insertQuestions) {
						$success = true;						
					}
					else {
						$errors[] = 'Erreur lors de l\'ajout de la question en base de données';
					}
				}
				else {
					$errors[] = 'Erreur lors de l\'ajout total en base de données';
				}
				
			} //end of count errors

		} // end of if $_POST empty

		$params = [
			'errors' => $errors,
			'success' => $success,
		];

		$this->show('admin/admin_add_categories', $params);

	} // end function addcategories

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