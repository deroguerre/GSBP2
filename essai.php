<?php

  /*function chargerClass($classe)
  {
    require 'class/'.$classe.'.class.php';
  }
  
  spl_autoload_register('chargerClass');
  
  $event = new Event(array(
    'title' => 'essaiPOO',
    'user_id' => 3,
    'start' => '2014-04-22 00:00:00',
    'end' => '2014-04-22 00:00:00'
  ));
  
  $db = new PDO('mysql:host=localhost;dbname=gsbp2', 'root', '');
  
  $manager = new eventsManager($db);
  $manager->add($event);*/
  
  $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
    $service = new SoapClient($wsdl);
    $allEvents = $service->GetAllEvents()->GetAllEventsResult;
    
    $listEvents = array();
    
    foreach($allEvents->CEvent as $oEvent)
    { 
      $listEvents[] = ['id' => "".$oEvent->EVENT_ID."",
                        'title' => "".$oEvent->EVENT_TITLE."",
                        'start' => "".$oEvent->EVENT_START."",
                        'end' => "".$oEvent->EVENT_END."",
                        'user_id' => "".$oEvent->EVENT_USER_ID."",
                        'confirm' => "".$oEvent->EVENT_CONFIRM."",//PROVOQUE UN BUG PARCEQUE LE WESERVICE NE SACTUALISE PAS
                        'color' => "".$oEvent->EVENT_COLOR.""];
    }
    
    var_dump($listEvents);
  
  /*require_once('fonctions/connectToDb.php');
  $sql = "SELECT * FROM event";
  $q = $connexion->prepare($sql);
  $q->execute();
  $result = $q->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($result);
  
  echo $json.'<br><br>';
  

    $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
    $service = new SoapClient($wsdl);
    $AllEvents = $service->GetAllEvents()->GetAllEventsResult;
    $stringEvents = array();
    foreach($AllEvents->CEvent as $event)
    {
      $stringEvents[] = ['id' => "".$event->EVENT_ID."", 'title' => "".$event->EVENT_TITLE."", 'start' => "".$event->EVENT_START."", 'end' => "".$event->EVENT_END.""];
    }
    
  echo json_encode($stringEvents);*/
  
  //$statut='';
  
  /*foreach($oEvent->listEvents as $event)
  {
    if($event->getId() == 1)
    {
        echo $event->getId();
        foreach($oUser->listUsers as $user)
        {
          if($user->getId == $event->getUser_Id())
          {
            $statut = $user->GetStatut();
          }
        }
    }
  }*/
  
  //echo $statut;
?>