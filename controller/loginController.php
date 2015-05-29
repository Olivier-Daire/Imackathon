<?php

	require_once __DIR__.'/../model/user.php';
	require_once __DIR__.'/../helpers/password.php';
	require_once __DIR__.'/../helpers/input.php';

	/**
	 * Fonctions liées au login
	 */
	class Login
	{
		/**
		 * Connecte l'utilisateur
		 * @param  [string] $username 
		 * @param  [string] $password 
		 */
		public static function loginUser($username, $password)
		{
			$input = InputData::checkForEmpty($username);
			$input2 = InputData::checkForEmpty($password);

			if ($input === -1 || $input2 === -1){
				header("Location: ../view/back/connexion.php");
			}
			else {

				$userManager = new User();
				$user = $userManager->getUserByLogin($username);
				
				$check = Password::check($password, $user['password']);

				if ($check === TRUE) {
					session_start();
					$_SESSION['userLogin'] = $user['login'];
					header("Location: ../view/back/back.php");

				} else {
					header("Location: ../view/back/connexion.php");
				}
			}

			
		}

		/**
		 * Déconnecte l'utilisateur
		 */
		public static function logoutUser()
		{
			session_start();
			session_unset();
			session_destroy();
			header("Location: ../view/front/index.php");
		}
	}

?>
