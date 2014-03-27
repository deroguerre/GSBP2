<h4>Test client web service</h4>
<?php 
  include('event.class.php');
  $Evenements = new CEvents();
  //$Evenements->getAllEventsOfService();
  //echo $Evenements->stringEvents;
  //$wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
  //$service = new SoapClient($wsdl);

 // $AllEvents = $service->GetAllEvents()->GetAllEventsResult;

  /*$wsdl = "http://localhost:50497/ServiceGSB.svc?wsdl";
  $service = new SoapClient($wsdl);
  $AllEvents = $service->GetAllEvents();
  var_dump(json_encode($AllEvents->GetAllEventsResult->CEvent));*/
  
  //var_dump($Evenements->EventsToCalendar());
  $Evenements->getAllEventsOfService();
  echo  '<br><br><br>';
  var_dump($Evenements->listEvents[0]);
  echo  '<br><br><br>';
  
  EventsOfDb();
  function EventsOfDb()
  {
    // liste des événements
    $json = array();
    // requête qui récupère les événements
    $requete = "SELECT * FROM event ORDER BY id";

    // connexion à la base de données
    try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsbp2', 'root', '');
    } catch(Exception $e) {
    exit('Impossible de se connecter à la base de données.');
    }
    // exécution de la requête
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

    // envoi du résultat au success
    print_r(json_encode($resultat->fetchAll(PDO::FETCH_ASSOC)));
  }

    /*foreach ($AllEvents->CEvent as $Event)
    {
    echo $Event->EVENT_TITLE."<br>";
  }*/
  
  
  /*public function getAllEventsFromService()
  {

    
    foreach($AllEvents['GetAllEventsResult']->CEvent as $event)
    {
      $Event = new $this;
      $Event->setId($event->EVENT_ID);
      $Event->setTitle($event->EVENT_TITLE);
      $Event->setStart($event->EVENT_START);
      $Event->setEnd($event->EVENT_END);
      
      $Event->setListEvents
      
    }
  }*/
  
  /*class Event
  {
    private $_id;
    private $_title;
    private $_start;
    private $_end;
    
    public function getId()
    {
      return $this->_id;
    }
    
    public function setId($id)
    {
      $this->_id = $id;
    }
  }
  
  foreach($AllEvents['GetAllEventsResult']->CEvent as $event)
  {
    $Event = new Event();
    $Event->setId($event->EVENT_ID);
    $Event->
    $resultEvent[] = $Event;
  }
  
  echo $resultEvent[1]->getId();*/

  //echo $AllEvents['GetAllEventsResult']->CEvent[2]->EVENT_START;
  //$jsonObject = json_decode(file_get_contents("http://localhost:50497/ServiceGSB.svc?wsdl");
  //var_dump($service->__soapcall("GetAllEvents");
  //$essai = $service->GetAllEvents();
  //echo stdClass $oui;
  
  //$response = file_get_contents('http://localhost:50497/ServiceGSB.svc?wsdl');
  //$response = json_decode($response);
  //var_dump($response);

  
  //var_dump(__CLASS__, $AllEvents);
  
  //$AllEvents = array();
  
  //echo $result;


  //$client = new SoapClient("http://localhost:50497/ServiceGSB.svc?wsdl");
  
  //var_dump($client->AllEvents());
  
  //$resu = (array)$client->GetAllEvents();
  
  /*class Event
  {
    private $_id;
    private $_title;
    private $_start;
    private $_end;
  }*/
 
  //$objet = json_decode($client->AllEvents(), true, 3);
  //echo $objet;
  //$essai = var_dump(json_decode($objet));
  //echo $resu['GetAllEventsResult']->row();
  //echo $resu['AllEventsResult'];
  
  //$listEvent = json_decode(file_get_contents("http://localhost:50497/ServiceGSB.svc?wsdl"));
  
  //echo $chaine->EVENT_ID;
  
?>