<?php
session_start();
$title=wd_remove_accents($_POST['title']);
$start=$_POST['start'];
$end=$_POST['end'];
$user_id=$_POST['user_id'];

$color = '#ABC8E2';

switch ($_SESSION['statut_id'])
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
}

// connexion à la base de données
require_once('../fonctions/connectToDb.php');
 
$sql = "INSERT INTO event (title, start, end, user_id, color) VALUES (:title, :start, :end, :user_id, :color)";
$q = $connexion->prepare($sql);
$q->execute(array(':title'=>$title, ':start'=>$start, ':end'=>$end, ':user_id'=>$user_id, ':color'=>$color));

//Fonction pour supprimer les charactère spéciaux
function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    
    return $str;
}
?>