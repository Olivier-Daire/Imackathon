<?php
	/**
	 * Compatibilité avec les functions password_* de l'API PHP 5.5
	 * https://github.com/ircmaxell/password_compat
	 */
	require_once('../lib/password_compat/password.php');

	/**
	* Utilitaire pour gérer les mots de passe :
	* encrypter, décrypter
	*/
	class Password
	{
		/**
		 * Encrypte un mot de passe en utilisant l'algorithme bcrypt et un salt
		 * @param  [string] $pwd mot de passe
		 * @return [string]      mot de passe encrypté
		 */
		public static function encrypt($pwd){
			return password_hash($pwd, PASSWORD_DEFAULT);
		}

		/**
		 * Vérifie la correspondance entre un mot de passe non crypté et un crypté
		 * @param  [string] $pwd     mote de passe non crypté
		 * @param  [string] $hashPwd mote de passe crypté
		 * @return [boolean]         
		 */
		public static function check($pwd, $hashPwd){
			return password_verify($pwd, $hashPwd);
		}
	}

?>
