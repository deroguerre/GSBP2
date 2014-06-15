<?php

/*$id=$_POST['id'];
$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];
 
// connexion à la base de données
require_once('../fonctions/connectToDb.php');
 
$sql = "UPDATE event SET title=?, start=?, end=? WHERE id=?";
$q = $connexion->prepare($sql);
$q->execute(array($title,$start,$end,$id));*/

require_once 'connectToDb.php';

function chargerClass($classe) {
  require '../class/'.$classe.'.class.php';
}

spl_autoload_register('chargerClass');

$event = new Event(array(
  'id' => $_POST['id'],
  'title' => $_POST['title'],
  'start' => $_POST['start'],
  'end' => $_POST['end'],
  'user_id' => '1',
  'confirm' => '0',
  'color' => ''
));

$manager = new eventsManager($connexion);
$manager->update($event);
?>