<?php
session_start();
require_once('../fonctions/connectToDb.php');

//Variables posté
$email = $_POST['email'];
$password = md5($_POST['password']);

//Récupère les infos user
$resultat = $connexion->query("SELECT id, email, password, nom, statut_id FROM user WHERE email='".$email."'");
$resultat->setFetchMode(PDO::FETCH_OBJ);
$ligne = $resultat->fetch();

//Enregistre les infos user dans les variables de session
if($password == $ligne->password)
{
  $_SESSION['id'] = $ligne->id;
	$_SESSION['email'] = $ligne->email;
  $_SESSION['nom'] = $ligne->nom;
  $_SESSION['statut_id'] = $ligne->statut_id;
	header("Location: ../dashboard.php");
}
else
{
	echo ("Erreur de connexion
		<script language='Javascript'>
			document.location.replace('../index.php');
		</script>");
}
?>