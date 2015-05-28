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
			$query->execute(array('username' => $login));

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}

		public function updateUserProfile($userLogin, $userProfileArray){

			$connexion = DBConnexion::connectToDB();
			$i = 0;

			foreach ($userProfileArray as $key => $value) {
				if ($value !== NULL){
					if ($i === 0)
						$parameters = $key." = :".$key;
					else
						$parameters .= ", ".$key." = :".$key;
					$i++;
				}
			}

			$query = $connexion->prepare('UPDATE user SET '.$parameters.' WHERE login = :userLogin');
			foreach ($userProfileArray as $key => $value){
				if ($value !== NULL)
					$query->bindParam(':'.$key, $userProfileArray[$key]);
			}
			$query->bindParam(':userLogin', $userLogin);
			$result = $query->execute();

			if ($result)
				return 0;
			else
				return -1;

		}


	}
?>
