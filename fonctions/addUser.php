<?php
require_once('../fonctions/connectToDb.php');

$sql = "INSERT INTO user (email, password, nom, prenom, adresse, cp, ville) VALUES (:email, :password, :nom, :prenom, :adresse, :cp, :ville)";
$q = $connexion->prepare($sql);
$q->execute(array(':email'=>$_POST['email'],
                  ':password'=>md5($_POST['password']),
                  ':nom'=>$_POST['nom'],
                  ':prenom'=>$_POST['prenom'],
                  ':adresse'=>$_POST['adresse'],
                  ':cp'=>$_POST['cp'],
                  ':ville'=>$_POST['ville']));
header('Location: ../index.php');  
?>