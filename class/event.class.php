<?php
class CEvents
{
  //Attributs évènement
  private $id;
  private $title;
  private $start;
  private $end;
 
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
}
?>