<?php
class CEvents
{

  public function getAllEvents()
  {
    require_once('fonctions/connectToDb.php');      
    $sql = "SELECT * FROM event";
    foreach($connexion->query($sql) as $dbevent)
    {
      $oEvent = new $this;
      $oEvent->setId($dbevent['id']);
      $oEvent->setTitle($dbevent['title']);
      $oEvent->setStart($dbevent['start']);
      $oEvent->setEnd($dbevent['end']);
      $oEvent->setUser_id($dbevent['user_id']);
      $oEvent->setConfirm($dbevent['confirm']);
      $oEvent->setColor($dbevent['color']);
      
      $this->listEvents[] = $oEvent;
    }
  }

  //Attributs évènement
  private $id;
  private $title;
  private $start;
  private $end;
  private $user_id;
  private $confirm;
  private $color;
 
  public $listEvents = array();
  
  public function getId(){
    return $this->id;
  } 
  public function setId($id){
    $this->id = $id;
  }
  
  public function getTitle(){
    return $this->title;
  }
  public function setTitle($title){
    $this->title = $title;
  }
  
  public function getStart(){
    return $this->start;
  }
  public function setStart($start){
    $this->start = $start;
  }
  
  public function getEnd(){
    return $this->end;
  } 
  public function setEnd($end){
    $this->end = $end;
  }
  
  public function getUser_id(){
    return $this->user_id;
  } 
  public function setUser_id($user_id){
    $this->user_id = $user_id;
  }
  
  public function getConfirm(){
    return $this->confirm;
  } 
  public function seConfirm($confirm){
    $this->confirm = $confirm;
  }
  
  public function getColor(){
    return $this->color;
  } 
  public function setColor($color){
    $this->color = $color;
  }
  
  public function getAllEventsOfService()
  {
    $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
    $service = new SoapClient($wsdl);
    $AllEvents = $service->GetAllEvents()->GetAllEventsResult;
    
    foreach($AllEvents->CEvent as $event)
    {
      $oEvent = new $this;
      $oEvent->setId($event->EVENT_ID);
      $oEvent->setTitle($event->EVENT_TITLE);
      $oEvent->setStart($event->EVENT_START);
      $oEvent->setEnd($event->EVENT_END);
      //$oEvent->setUser_id($event->EVENT_USER_ID);
      
      $this->listEvents[] = $oEvent;
    }
  }
  
  public function EventsToCalendar()
  {
    $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
    $service = new SoapClient($wsdl);
    $AllEvents = $service->GetAllEvents()->GetAllEventsResult;
    $stringEvents = array();
    foreach($AllEvents->CEvent as $event)
    {
      $stringEvents[] = ['id' => "".$event->EVENT_ID."", 'title' => "".$event->EVENT_TITLE."", 'start' => "".$event->EVENT_START."", 'end' => "".$event->EVENT_END.""];
    }
    return $stringEvents;
  }
  
  public function EventsOfUser()
  {
    require_once('fonctions/connectToDb.php');

    $resultat = $connexion->query("SELECT * FROM event WHERE user_id='".$_SESSION['id']."'");
    $resultat->setFetchMode(PDO::FETCH_OBJ);

    //$ligne = $resultat->fetch();
    
    return $resultat;
  }
}
?>