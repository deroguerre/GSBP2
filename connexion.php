<?php
session_start();
$PARAM_hote = 'localhost';
$PARAM_nom_bd = 'freebug';
$PARAM_utilisateur = 'root';
$PARAM_mot_passe = '';

//Variables locales
$email = $_POST['email'];
$password = $_POST['password'];

try
{
  $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
}
 
catch(Exception $e)
{
  echo 'Erreur : '.$e->getMessage().'<br />';
  echo 'N° : '.$e->getCode();
}

//$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

$resultat = $connexion->query("SELECT email, password FROM users WHERE email='".$email."'");
$resultat->setFetchMode(PDO::FETCH_OBJ);

$ligne = $resultat->fetch();

//$sql = "SELECT email, password FROM users WHERE email='".$email."' AND password='".$password."'";
//$req = mysql_query($sql);

//$resultat = mysql_fetch_assoc($req);



if($password == $ligne->password)
{
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	header("Location: dashboard.php");
}
else
{
	echo ("Erreur de connexion
		<script language='Javascript'>
			document.location.replace('index.php');
		</script>");
}
?>