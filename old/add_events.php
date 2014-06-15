<?php
require 'removeAccents.php';

function chargerClass($classe) {
  require '../class/'.$classe.'.class.php';
}

spl_autoload_register('chargerClass');

$event = new Event(array(
  'title' => $_POST['title'],
  'user_id' => $_POST['user_id'],
  'start' => $_POST['start'],
  'end' => $_POST['end']
));

$db = new PDO('mysql:host=localhost;dbname=gsbp2', 'root', '');

$manager = new eventsManager($db);
$manager->add($event);
?>