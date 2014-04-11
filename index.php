<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gui</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--<script src="js/custom.js"></script>-->
    <script src='js/jquery-2.1.0.min.js'></script>
    
  </head>
  <body>
  
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">GSB</a>
        </div>
        <div class="navbar-collapse collapse ">
          <ul class="nav navbar-nav navbar-right">
            <?php 
              if(!isset($_SESSION['email']))
              {
                echo "<li>
                <form method='post' action='fonctions/connexion.php' role='form' class='navbar-form navbar-right'>
                  <input type='email' class='form-control' id='email' name='email' placeholder='Email'>
                  <input type='password' class='form-control' id='password' name='password' placeholder='Mot de passe'>
                  <button type='submit' class='btn btn-default'>Connexion</button>
                </form>
                </li>
                <li id='inscription'>
                  <a href='#'>S'inscrire</a>
                </li>
                <li id='contact'><a href='contact.php'>Contact</a></li>";
              }
              else
              {
                require_once('templates/nav.html');
              }
            ?>
          </ul>
        </div>
      </div>
    </div> 
    <div id="menu-gauche" class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        </div>
      </div>
    </div>
    
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <div id='main'>
        <h1 class="page-header">Accueil</h1>
        <h4>L'entreprise</h4>
      
        <p>Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion entre le géant américain Galaxy (spécialisé 
        dans le secteur des maladies virales dont le SIDA et les hépatites) et le conglomérat européen Swiss Bourdin 
        (travaillant sur des médicaments plus conventionnels), lui même déjà union de trois petits laboratoires .
        En 2009, les deux géants pharmaceutiques ont uni leurs forces pour créer un leader de ce secteur industriel. 
        L'entité Galaxy Swiss Bourdin Europe a établi son siège administratif à Paris. 
        Le siège social de la multinationale est situé à Philadelphie, Pennsylvanie, aux Etats-Unis.</p>
      </div>
    </div>
    
    
    <script>
      $(function() {
        $('#inscription').click(function() {
          $('#main').load('inscription.php');
        });
      });
    </script>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>