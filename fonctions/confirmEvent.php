<?php
  session_start();
  require_once('../fonctions/connectToDb.php');
  
  /*$sql = "SELECT statut_id FROM user WHERE id=(SELECT user_id FROM event WHERE id='".$_POST['id']."')";
  $connexion->query($sql)
  $result = $connexion->fetch(PDO::FETCH_OBJ);
  
  $color='';
  
  switch ($result)
  {
    case 0:
      $color = '#ABC8E2';
    break;
    
    case 1:
      $color = '#5F8CA3';
    break;
    
    case 2:
      $color = '#B0CC99';
    break;
    
    case 5:
      $color = '#C44C51';
    break;
    
    default:
      $color = '#046380';
  }*/
  
  
  $sql = "UPDATE event SET confirm='1', color='#5F8CA3' WHERE id='".$_POST['id']."'";
  $q = $connexion->prepare($sql);
  $q->execute();
  header('Location: ../allEvents.php');
  
?>