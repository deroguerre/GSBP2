<?php
class User
{
  
  //Attributs user
  private $id;
  private $email;
  private $date_inscription;
  private $nom;
  private $prenom;
  private $adresse;
  private $cp;
  private $ville;
  private $statut_id;
  private $salaire;
  
  public function getAllUsers()
  {
    require_once('fonctions/connectToDb.php');
    
    $sql = "SELECT * FROM user";
    $listUsers = array();
    
    foreach($connexion->query($sql) as $dbuser)
    {
      $oUser = new $this;
      $oUser->setId($dbuser['id']);
      $oUser->setEmail($dbuser['email']);
      $oUser->setDateInscription($dbuser['date_inscription']);
      $oUser->setNom($dbuser['nom']);
      $oUser->setPrenom($dbuser['prenom']);
      $oUser->setAdresse($dbuser['adresse']);
      $oUser->setCp($dbuser['cp']);
      $oUser->setVille($dbuser['ville']);
      $oUser->setStatutId($dbuser['statut_id']);
      $oUser->setSalaire($dbuser['salaire']);
      
      $listUsers[] = $oUser;
    }
    
    return $listUsers;
  }
  
  
  public function getId(){
    return $this->id;
  } 
  public function setId($id){
    $this->id = $id;
  }
  
  public function getEmail(){
    return $this->email;
  } 
  public function setEmail($email){
    $this->email = $email;
  }
  
  public function getDateInscription(){
    return $this->date_inscription;
  } 
  public function setDateInscription($date_inscription){
    $this->date_inscription = $date_inscription;
  }
  
  public function getNom(){
    return $this->nom;
  } 
  public function setNom($nom){
    $this->nom = $nom;
  }
  
  public function getPrenom(){
    return $this->prenom;
  } 
  public function setPrenom($prenom){
    $this->prenom = $prenom;
  }
  
  public function getAdresse(){
    return $this->adresse;
  } 
  public function setAdresse($adresse){
    $this->adresse = $adresse;
  }
  
  public function getCp(){
    return $this->cp;
  } 
  public function setCp($cp){
    $this->cp = $cp;
  }
  
  public function getVille(){
    return $this->ville;
  } 
  public function setVille($ville){
    $this->ville = $ville;
  }
  
  public function getStatutId(){
    return $this->statut_id;
  } 
  public function setStatutId($statut_id){
    $this->statut_id = $statut_id;
  }
  
  public function getSalaire(){
    return $this->salaire;
  } 
  public function setSalaire($salaire){
    $this->salaire = $salaire;
  }
}
?>