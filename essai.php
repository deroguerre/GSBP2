<?php

  function chargerClass($classe)
  {
    require 'class/'.$classe.'.class.php';
  }
  
  spl_autoload_register('chargerClass');
  
  
  //include('class/event.class.php');
  //include('class/user.class.php');

  
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