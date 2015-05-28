<?php
	
	require_once __DIR__.'/../connexionDB.php';

	/**
	* Gestion du modèle user
	*/
	class Xml
	{	
		/**
		 * Récupère xml
		 * @param  [date] 		$date
		 * @return [mixed]      Utilisateur (si trouvé)
		 */
		static function getXMLFiles(){
			$connexion = DBConnexion::connectToDB();
	
			$query = $connexion->prepare('SELECT * FROM xml');
			$query->execute();

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}


		/**
		 * 
		 */

		static function addXml($nameFile){
			$connexion = DBConnexion::connectToDB();

			$query = $connexion->prepare('INSERT INTO xml (filename) VALUES (:filename)');
			$query->execute();

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}
	}
?>