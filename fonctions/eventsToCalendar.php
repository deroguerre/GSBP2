<?php
  
  //VIA LE WEBSERVICE
  /*include('../class/event.class.php');
  $Evenements = new Event(); 
  echo json_encode($Evenements->EventsToCalendar());*/
  
  //VIA PDO
  /*session_start();
  require_once('../fonctions/connectToDb.php');
  $sql = "SELECT * FROM event WHERE user_id='".$_SESSION['id']."'";
  if($_SESSION['statut_id'] == 5)
  {
    $sql = "SELECT * FROM event";
  }
  $q = $connexion->prepare($sql);
  $q->execute();
  $result = $q->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($result);
  
  echo $json;*/
  
  //VIA POO 
  function chargerClass($classe)
  {
    require '../class/'.$classe.'.class.php';
  }
  
  //Charge dynamiquement les methodes
  spl_autoload_register('chargerClass');
  
  $db = new PDO('mysql:host=localhost;dbname=gsbp2', 'root', '');
  
  $manager = new eventsManager($db);
  $result = $manager->getListFromDb();
  
  echo json_encode($manager->getListFromService());
 
?>
