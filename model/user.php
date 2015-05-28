<?php
	
	require_once __DIR__.'/../DBconnexion.php';

	/**
	* Gestion du modèle user
	*/
	class User
	{	
		/**
		 * Récupère un utilisateur par son nom
		 * @param  [string] $username
		 * @return [mixed]           Utilisateur (si trouvé)
		 */
		public function getUserByLogin($login){
			$connexion = DBConnexion::connectToDB();
	
			$query = $connexion->prepare('SELECT * FROM user WHERE login = :username LIMIT 1');
			$query->execute(array('username' => $username));

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}
	}
?>
