<?php
	/**
	 * Gestion des formulaires : appel au bon controleur en fonction du cas :
	 * connexion, inscription, achat, déconnexion, changement de mdp
	 */

	require_once __DIR__.'/../controller/loginController.php';
	require_once __DIR__.'/../controller/registrationController.php';
	require_once __DIR__.'/../controller/transactionController.php';
	require_once __DIR__.'/../controller/mainController.php';

	$formType = $_POST['formType'];

	switch ($formType) {
		case 'connexion':
			$username = $_POST['pseudo'];
			$password = $_POST['password'];

			Login::loginUser($username, $password);
		
			break;
		case 'deconnexion':
			Login::logoutUser();
			
			break;

		case 'registration':
			$username = $_POST['pseudo'];
			$password = $_POST['password'];
			$passwordCheck = $_POST['passwordVerif'];
			$code = $_POST['g-recaptcha-response'];
			$check = Registration::checkPass($password, $passwordCheck);
			if($check === false) break;
			$captcha = Registration::isValid($code,null);
			if($captcha === false) break;

			Registration::registerUser($username, $password);

			break;
		
		case 'changePassword':

			if(!isset($_SESSION) || $_SESSION['userId'] === '') session_start();
			$oldPassword = $_POST['oldPassword'];
			$newPassword = $_POST['newPassword'];
			$userId = $_SESSION['userId'];
			UserProfileController::changePwd($userId, $oldPassword, $newPassword);

			break;

		case 'transaction':

			$id = $_POST['id'];
			session_start(); // FIXME 
			$userId = $_SESSION['userId'];
			$transaction = new Transaction();

			switch ($id) {
				case 1:
				case 2:
				case 3:
				case 4:
					$prostituteName = $_POST['name'];
					$transaction->buyProstitute($userId, $id, $prostituteName);
								
					break;

				case 5:
				case 6:
				case 7:
				case 8:
					$guardName = $_POST['name'];
					$transaction->buyGuard($userId, $id, $guardName);
				
					break;

				case 9:
				case 10:
				case 11:
					$transaction->buyLocation($userId, $id);

					break;

				default:
					# code...
					break;
			}
			break;

		default:
			# code...
			break;
	}

	

?>
