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
				//header("Location: ../view/connexion.php");
				echo("mauvaise connexion");
				return;
			}
			else {

				$userManager = new User();
				$user = $userManager->getUserByLogin($username);

				$check = Password::check($password, $user['password']);

				if ($check) {
					session_start();
					$_SESSION['userId'] = $user['id'];
					
					//header("Location: ../view/back.php");
				} else {
					//header("Location: ../view/connexion.php");
					echo("error");
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
			header("Location: ../view/connexion.php");
		}
	}

?>
