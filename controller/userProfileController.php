<?php

	require_once __DIR__.'/../model/user.php';
	require_once __DIR__.'/../helpers/password.php';
	class UserProfileController{
		private $userLogin;
		
		/**
		 * Récupère les infos sur l'utilisateur connecté
		 * @return [mixed] infos user
		 */
		public static function getUserProfile()
		{
			$userLogin = $_SESSION['login'];

			$userManager = new User();
			$user = $userManager->getUserByLogin($userLogin);

			return $user;
		}

				/**
		 * vérifie & change le mot de passe de l'utilisateur
		 * @param  [type] $userLogin   id de l'utilisateur
		 * @param  [type] $oldPassword ancien mot de passe à vérifier
		 * @param  [type] $newPassword nouveau mot de passe
		 */
		public static function changePwd($userLogin, $oldPassword, $newPassword){
			

			$userManager = new User();
			$user = $userManager->getUserByLogin($userLogin);

			$password = Password::check($oldPassword,$user['password']);
			if ($password === TRUE){
				$array['password'] = Password::encrypt($newPassword);
				$result = $userManager->updateUserProfile($userLogin, $array);

			}
			header("Location: ../view/back.php");
		}

	}
?>
