<?php

	require_once __DIR__.'/../model/user.php';

	/**
	* Gère la page principale du business
	*/
	class Main
	{
		private $userId;
		
		/**
		 * Récupère les infos sur l'utilisateur connecté
		 * @return [mixed] infos user
		 */
		public static function getUserProfile()
		{
			$userId = $_SESSION['userId'];

			$userManager = new User();
			$user = $userManager->getUserByLogin($userId);

			return $user;
		}

	}
?>
