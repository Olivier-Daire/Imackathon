<?php
	
	require_once __DIR__.'/config.php';

	/**
	 * Fonctions liées à la BDD
	 */
	class DBconnexion
	{

		/**
		 * Connexte à la BDD selon la config indiquée dans config.php
		 * @return  connexion object
		 */
		public static function connectToDB()
		{
			global $config;
			try {
			    $connexion = new PDO('mysql:host='.$config['server'].';dbname='.$config['database'].'', $config['dbUser'], $config['pwd']);
			    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    return $connexion;
			} catch (PDOException $e) {
			    echo "Erreur !: " . $e->getMessage() . "<br/>";
			    die();
			}
		}

		/**
		 * Déconnecte de la BDD
		 */
		public static function disconnetToDB(){
			$connexion = null;
		}
	}

?>
