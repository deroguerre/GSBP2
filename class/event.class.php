<?php
class Event
{
  //Attributs évènement
  private $id;
  private $title;
  private $start;
  private $end;
  private $user_id;
  private $confirm;
  private $color;
  
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
  
//////////////////////////////////////////////
  public function __construct($donnees)
  {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    foreach($donnees as $key => $value)
    {
      //On récupère le nom du setter correspondant à l'attribut
      $method = 'set'.ucfirst($key);
      
      if(method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function getAllEvents()
  {
    require_once('fonctions/connectToDb.php');      
    $sql = "SELECT * FROM event";
    $listEvents = array();
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
      
      $listEvents[] = $oEvent;
    }
    
    return $listEvents;
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
    $options = array('cache_wsdl' => WSDL_CACHE_NONE);
    $service = new SoapClient($wsdl, $options);
    $AllEvents = $service->GetAllEvents()->GetAllEventsResult;
    
    $stringEvents = array();
    
    foreach($AllEvents->CEvent as $event)
    {
      $stringEvents[] = ['id' => "".$event->EVENT_ID."",
                      'title' => "".$event->EVENT_TITLE."",
                      'start' => "".$event->EVENT_START."",
                      'end' => "".$event->EVENT_END."",
                      'user_id' => "".$oEvent->EVENT_USER_ID."",
                      'confirm' => "".$oEvent->EVENT_CONFIRM."",//PROVOQUE UN BUG PARCEQUE LE WESERVICE NE SACTUALISE PAS
                      'color' => "".$oEvent->EVENT_COLOR.""];
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