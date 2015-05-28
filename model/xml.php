<?php
	
	require_once __DIR__.'/../DBconnexion.php';

	/**
	* Gestion du modèle XML
	*/
	class Xml
	{	
		/**
		 * Récupère xml
		 * @param  [date] 		$date
		 * @return [mixed]      Utilisateur (si trouvé)
		 */
		public static function getXMLFiles(){
			$connexion = DBConnexion::connectToDB();
	
			$query = $connexion->prepare('SELECT * FROM xml');
			$query->execute();

			$result = $query->fetchAll();

		 	return $result;
		}


		/**
		 * f
		 */
		public static function addXml($nameFile){
			$connexion = DBConnexion::connectToDB();

			$query = $connexion->prepare('INSERT INTO xml (filename) VALUES (:filename)');
			$query->execute(array('filename' => $nameFile));

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}


		public static function deleteXML($id){
			$connexion = DBConnexion::connectToDB();

			$query = $connexion->prepare('DELETE FROM xml WHERE id =  :id');
			$query->execute(array('id' => $id));

		 	return $result;
		}
	}
?>
