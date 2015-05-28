<?php
	/**
	 * Gestion des formulaires : appel au bon controleur en fonction du cas :
	 * connexion, inscription, achat, déconnexion, changement de mdp
	 */

	require_once __DIR__.'/../controller/loginController.php';
	require_once __DIR__.'/../controller/xmlController.php';
	require_once __DIR__.'/../controller/userProfileController.php';

	$formType = $_POST['formType'];
	var_dump($_POST);
	switch ($formType) {
		case 'connexion':
			$username = $_POST['login'];
			$password = $_POST['password'];

			Login::loginUser($username, $password);
		
			break;
		case 'edit':
			$filename = $_POST['filename'];
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
				header("Location: ../view/back.php");
			break;

		case 'deleteFile':

			$id = $_POST["idFile"];
			xmlController::deleteXMLFile($id);
			

			break;

				default:
					# code...
					break;
			break;

		default:
			# code...
			break;
	}

	

?>
