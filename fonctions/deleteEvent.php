<?php
  /*require_once('../fonctions/connectToDb.php');
 
  $sql = "DELETE FROM event WHERE id='".$_POST['id']."'";
  $q = $connexion->prepare($sql);
  $q->execute();*/
  
  require_once 'connectToDb.php';

  function chargerClass($classe) {
    require '../class/'.$classe.'.class.php';
  }

  spl_autoload_register('chargerClass');

  $event = new Event(array(
    'id' => $_POST['id']
  ));

  $manager = new eventsManager($connexion);
  $manager->delete($event);
  header('Location: ../planning.php');
?>