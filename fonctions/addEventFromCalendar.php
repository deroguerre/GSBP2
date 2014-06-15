<?php
require 'removeAccents.php';
require_once 'connectToDb.php';

function chargerClass($classe) {
  require '../class/'.$classe.'.class.php';
}

spl_autoload_register('chargerClass');

$event = new Event(array(
  'title' => removeAccents($_POST['title']),
  'start' => $_POST['start'],
  'end' => $_POST['end'],
  'user_id' => $_POST['user_id']
));

$manager = new eventsManager($connexion);
$manager->addFromService($event);
?>