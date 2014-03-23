<h4>Test client web service</h4>
<?php 

  $wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
  $service = new SoapClient($wsdl, array $essai);
  
  //$AllEvents = array();
  $AllEvents = $service->GetAllEvents();
  
  


  //$client = new SoapClient("http://localhost:50497/ServiceGSB.svc?wsdl");
  
  //var_dump($client->AllEvents());
  
  //$resu = (array)$client->GetAllEvents();
  
  /*class Event
  {
    private $_id;
    private $_title;
    private $_start;
    private $_end;
  */
 
  //$objet = json_decode($client->AllEvents(), true, 3);
  //echo $objet;
  //$essai = var_dump(json_decode($objet));
  //echo $resu['GetAllEventsResult']->row();
  //echo $resu['AllEventsResult'];
  
  //$listEvent = json_decode(file_get_contents("http://localhost:50497/ServiceGSB.svc?wsdl"));
  
  //echo $chaine->EVENT_ID;
  
?>