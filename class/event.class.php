<?php
class Events
{
  //Attributs évènement
  private $_id;
  private $_title;
  private $_start;
  private $_end;
  
  private $_listEvents = array();
  
  public function getId(){
    return $this->_id;
  } 
  public function setId($id){
    $this->_id = $id;
  }
  
  public function getTitle(){
    return $this->_title;
  }
  public function setTitle($title){
    $this->_title = $title;
  }
  
  public function getStart(){
    return $this->_start;
  }
  public function setStart($start){
    $this->_start = $start;
  }
  
  public function getEnd(){
    return $this->_end;
  } 
  public function setEnd($end){
    $this->_end = $end;
  }
  
  public function getListEvents(){
    return $this->_listEvents;
  } 
  public function setListEvents($listEvents){
    $this->_listEvents[] = $listEvents;
  }
  
  public function getAllEventsFromService()
  {
    $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
    $service = new SoapClient($wsdl);
    $AllEvents = $service->GetAllEvents()->GetAllEventsResult;
    
    foreach($AllEvents->CEvent as $event)
    {
      $Event = new $this;
      $Event->setId($event->EVENT_ID);
      $Event->setTitle($event->EVENT_TITLE);
      $Event->setStart($event->EVENT_START);
      $Event->setEnd($event->EVENT_END);
      
      $Event->setListEvents($Event);
    }
  }
}
?>