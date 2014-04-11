<?php 
  $PARAM_hote = 'localhost';
  $PARAM_nom_bd = 'gsbp2';
  $PARAM_utilisateur = 'root';
  $PARAM_mot_passe = '';

  try
  {
    $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
  }
  catch(Exception $e)
  {
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
  }
?>