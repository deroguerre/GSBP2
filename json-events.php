<?php
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
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>
