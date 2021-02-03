<?php
require("db_constants.php");

function connect(){
	$dsn="mysql:dbname=".BASE.";host=".SERVER;
		try{
		$connexion=new PDO($dsn,USER,PASSWD);
		//echo 'connexion réussie';
		return $connexion;
		}
		catch(PDOException $e){
		printf("Échec de la connexion : %s\n", $e->getMessage());
		exit();
		}
}

?>
