<?php
session_start();
class eventsManager {

  private $_db;
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  //AJOUT D'UNE TACHE EN SQL
  public function add(Event $event)
  {
    $q = $this->_db->prepare('INSERT INTO event SET title = :title, start = :start, end = :end, user_id = :user_id');
    
    $q->bindValue(':title', $event->getTitle());
    $q->bindValue(':start', $event->getStart());
    $q->bindValue(':end', $event->getEnd());
    $q->bindValue(':user_id', $event->getUser_id());
    
    $q->execute();
  }
  
  //AJOUT D'UNE TACHE VIA LE WEB SERVICE
  public function addFromService(Event $event)
  {
        $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";

        //PERMET DE RAFRAICHIR LE CACHE
        $options = array('cache_wsdl' => WSDL_CACHE_NONE);
        
        $service = new SoapClient($wsdl, $options);

        //APPEL LA METHODE ADDEVENT DU WEBSERVICE
        $result = $service->AddEvent(array('title' => $event->getTitle(),
                                            'start' => $event->getStart(),
                                            'end' => $event->getEnd(),
                                            'user_id' => $event->getUser_id()));
  }
  
  //DEBUG
  public function hello(Event $event)
  {
    var_dump($event);
  }
  
  //SUPPRIME UN EVENT EN SQL
  public function delete(Event $event)
  {
    $this->_db->exec('DELETE FROM event WHERE id = '.$event->getId());
  }
  
  
  public function get($id)
  {
    $id = (int)$id;
    
    $q = $this->_db->query('SELECT * FROM event WHERE id = '.$event->getId());
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
    return new Event($donnees);
  }
  
  //RECUPERE LA LISTE DES TACHES VIA LE WEBSERVICE
  public function getListFromService()
  {
    $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
    $service = new SoapClient($wsdl);
    
    if($_SESSION['statut_id'] == 5)
    {
      $allEvents = $service->GetAllEvents()->GetAllEventsResult;
    }
    else
    {
      $allEvents = $service->GetSpecEvents($_SESSION['statut_id']);
    }
    
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
    
    return $listEvents;
  }
  
  //RECUPERE LES TACHES EN SQL
  public function getListFromDb()
  {
    $listEvents = array();

    $q = $this->_db->query('SELECT * FROM event');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $listEvents[] = new Event($donnees);
    }

    return $listEvents;
  }
  
  //MODIFIE UNE TACHE
  public function update(Event $event)
  {
    $q = $this->_db->prepare('UPDATE event SET title = :title, start = :start, end = :end, user_id = :user_id, confirm = :confirm, color = :color WHERE id = :id');
    
    $q->bindValue(':id', $event->getId());
    $q->bindValue(':title', $event->getTitle());
    $q->bindValue(':start', $event->getStart());
    $q->bindValue(':end', $event->getEnd());
    $q->bindValue(':user_id', $event->getUser_id());
    $q->bindValue(':confirm', $event->getConfirm());
    $q->bindValue(':color', $event->getColor());
    
    $q->execute();
  }
  
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>