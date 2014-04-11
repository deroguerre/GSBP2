<?php

$id=$_POST['id'];
$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];
 
// connexion à la base de données
require_once('../fonctions/connectToDb.php');
 
$sql = "UPDATE event SET title=?, start=?, end=? WHERE id=?";
$q = $connexion->prepare($sql);
$q->execute(array($title,$start,$end,$id));
 
?>