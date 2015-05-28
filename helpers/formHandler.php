<?php
	/**
	 * Gestion des formulaires : appel au bon controleur en fonction du cas :
	 * connexion, inscription, achat, déconnexion, changement de mdp
	 */

	require_once __DIR__.'/../controller/loginController.php';
	require_once __DIR__.'/../controller/xmlController.php';

	$formType = $_POST['formType'];
	var_dump($_POST);
	switch ($formType) {
		case 'connexion':
			$username = $_POST['login'];
			$password = $_POST['password'];

			Login::loginUser($username, $password);
		
			break;
		case 'edit':
			$id = $_POST['id'];
			xmlController::editXML($id);
			
			break;
		
		case 'changePassword':

			if(!isset($_SESSION) || $_SESSION['userId'] === '') session_start();
			$oldPassword = $_POST['oldPassword'];
			$newPassword = $_POST['newPassword'];
			$userId = $_SESSION['userId'];
			UserProfileController::changePwd($userId, $oldPassword, $newPassword);

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
