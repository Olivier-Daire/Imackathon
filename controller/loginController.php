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
				header("Location: ../view/connexion.php");
			}
			else {

				$userManager = new User();
				$user = $userManager->getUserByLogin($username);
				// TODO : enable password encryption
				//$check = Password::check($password, $user['password']);

				if ($user['login'] == $username && $user['password'] == $password) {
					session_start();
					$_SESSION['userId'] = $user['id'];

				} else {
					header("Location: ../view/connexion.php");
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
