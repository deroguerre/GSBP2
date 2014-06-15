<?php
require_once 'connectToDb.php';

function chargerClass($classe) {
  require '../class/'.$classe.'.class.php';
}

spl_autoload_register('chargerClass');

$end = null;

if(empty($_POST['end']))
{
  $end = $_POST['start'];
}
else
{
  $end = $_POST['end'];
}

$event = new Event(array(
  'id' => $_POST['id'],
  'title' => $_POST['title'],
  'start' => $_POST['start'],
  'end' => $end,
  'user_id' => $_POST['user_id'],
  'confirm' => $_POST['confirm'],
  'color' => $_POST['color']
));

$manager = new eventsManager($connexion);
$manager->update($event);
?>