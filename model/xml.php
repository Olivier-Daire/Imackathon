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

		public static function getXMLFileById($id){
			$connexion = DBConnexion::connectToDB();
	
			$query = $connexion->prepare('SELECT * FROM xml WHERE id = :id');
			$query->execute(array('id' => $id));

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}

		public static function getXMLFileByName($filename){
			$connexion = DBConnexion::connectToDB();
	
			$query = $connexion->prepare('SELECT * FROM xml WHERE filename = :filename');
			$query->execute(array('filename' => $filename));

			$result = $query->fetch(PDO::FETCH_ASSOC);

		 	return $result;
		}



		/**
		 * f
		 */
		public static function addXml($nameFile){
			$connexion = DBConnexion::connectToDB();

			$query = $connexion->prepare('INSERT INTO xml (filename) VALUES (:filename)');
			$query->execute(array('filename' => $nameFile));

		}

		public static function updateXML($filename){
			$connexion = DBConnexion::connectToDB();

			$query = $connexion->prepare('UPDATE xml SET date=now() WHERE filename = :filename');
			$query->execute(array('filename' => $filename));
		}


		public static function deleteXMLFile($id){
			$connexion = DBConnexion::connectToDB();

			$query = $connexion->prepare('DELETE FROM xml WHERE id =  :id');
			$result = $query->execute(array('id' => $id));
			

		 	return $result;
		}
	}
?>
