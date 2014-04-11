<?php
  require_once('../fonctions/connectToDb.php');
 
  $sql = "DELETE FROM event WHERE id='".$_POST['id']."'";
  $q = $connexion->prepare($sql);
  $q->execute();
  header('Location: ../planning.php');
?>