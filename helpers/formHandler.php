<?php
	/**
	 * Gestion des formulaires : appel au bon controleur en fonction du cas :
	 * connexion, inscription, achat, déconnexion, changement de mdp
	 */

	require_once __DIR__.'/../controller/loginController.php';
	require_once __DIR__.'/../controller/xmlController.php';
	require_once __DIR__.'/../controller/userProfileController.php';
	if(isset($_POST['formType'])){
		$formType = $_POST['formType'];
		//var_dump($_POST);
		switch ($formType) {
			case 'connexion':
				$username = $_POST['login'];
				$password = $_POST['password'];

				Login::loginUser($username, $password);
			
				break;
			case 'edit':
				if(!isset($_SESSION)) session_start();
				$_SESSION['filename'] = $_POST['filename'];
				header("Location: ../lib/xml_editor/index.php");
				break;
			
			case 'changePassword':

				if(!isset($_SESSION) || $_SESSION['userLogin'] === '') session_start();
				$oldPassword = $_POST['oldPwd'];
				$newPassword = $_POST['newPwd'];
				$newPassword2 = $_POST['newPwd2'];
				$userLogin = $_SESSION['userLogin'];

				if($newPassword === $newPassword2)
						UserProfileController::changePwd($userLogin, $oldPassword, $newPassword);
				else
					header("Location: ../view/back/back.php");
				break;

			case 'deleteFile':

				$id = $_POST["idFile"];
				xmlController::deleteXMLFile($id);
				

				break;

			case 'upload':

				$filename = $_FILES['fichierXML']['name'];
				$tmpname = $_FILES['fichierXML']['tmp_name'];
				$errors = $_FILES['fichierXML']['error'] ;
				xmlController::uploadFile($filename, $tmpname, $errors);				
			


				break;

					default:
						# code...
						break;
				break;

			default:
				# code...
				break;
		}
	}
	else if(isset($_GET['logout'])){
		Login::logoutUser();
		header("Location: ../view/front/index.php");
	}
	else 
		header("Location: ../view/front/index.php");

	

?>
