<?php
  session_start();
  if(!isset($_SESSION['email']))
  {
    header("Location: index.php");
  }
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
    
    <script src="js/custom.js"></script>
    
  </head>
  <body>
  
    <!-- Include la barre de navigation -->
    <?php require_once('templates/nav.html') ?>
    
    <!-- Change la class -->
    <script>
      var btnMenu = document.getElementById('dashboard');
      btnMenu.className="active";
    </script>
    
    <div id="menu-gauche" class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id='calendrier'><a href='planning.php'>Calendrier</a></li>
            <li id='allEvents' class='active'><a href='#'>Événements</a></li>
          </ul>
          <ul class="nav nav-sidebar">
          <h4 style='color: #FC7F3C; padding: 30px'><span class="glyphicon glyphicon-time"></span> En attente de confirmation</h4>
          <?php
            require_once('fonctions/connectToDb.php');
            
            $sql = "SELECT * FROM event WHERE user_id='".$_SESSION['id']."' AND confirm='0' ORDER BY start ASC";
            foreach($connexion->query($sql) as $row)
            {
              echo "<div style='margin-left: 15px; margin-right: 15px' class='alert alert-danger'><b>".date("d/m/Y", strtotime($row['start']))."</b> ".$row['title']."</div>";
            }
          ?>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Tout les événements</h1>
      <div class="table-responsive clearfix">
        <table class="table table-hover">
          <thead>
            <tr>
              <th><span>ID</span></th>
              <th><span>Titre</span></a></th>
              <th class="text-center"><span>Date de début</span></th>
              <th class="text-center"><span>Date de fin</span></th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
              <?php

                require_once('fonctions/connectToDb.php');
                
                $sql = "SELECT * FROM event WHERE user_id='".$_SESSION['id']."'";
                if($_SESSION['statut_id'] == 5)
                {
                  $sql = "SELECT * FROM event";
                }
                foreach($connexion->query($sql) as $row)
                {
                  echo "
                    <tr>
                      <td>
                        <span>".$row['id']."</span>
                      </td>
                      <td>
                        <span>".$row['title']."</span>
                      </td>
                      <td class='text-center'>
                        <span>".date("d/m/Y", strtotime($row['start']))."</span>
                      </td>
                      <td class='text-center'>
                        <span>".date("d/m/Y", strtotime($row['end']))."</span>
                      </td>
                      <td class='text-right'>";
                        if($_SESSION['statut_id'] == 5 && $row['confirm']=='0')
                        {
                          echo "
                            <form method='post' action='fonctions/confirmEvent.php'>
                              <button type='submit' name='id' value='".$row['id']."' class='btn btn-success glyphicon glyphicon-ok'></button>
                            </form>";
                        }
                        elseif($row['confirm']=='1')
                        {
                          echo "<span class='glyphicon glyphicon-ok' style='padding-right: 12px; padding-top: 6px;'></span>";
                        }
                      echo "
                      </td>
                      <td>";
                        if($_SESSION['statut_id'] == 5)
                        {
                          echo "
                            <form method='post' action='fonctions/deleteEvent.php'>
                              <button type='submit' name='id' value='".$row['id']."' class='btn btn-danger glyphicon glyphicon-remove'></button>
                            </form>";
                        }
                      echo "
                      </td>
                    </tr>";
                }
                /*foreach($evenement->listEvents as $event)
                {
                  echo "
                    <tr>
                      <td>
                        <span>".$event->getId()."</span>
                      </td>
                      <td>
                        <span>".$event->getTitle()."</span>
                      </td>
                      <td class='text-center'>
                        <span>".$event->getStart()."</span>
                      </td>
                      <td class='text-center'>
                        <span>".$event->getEnd()."</span>
                      </td>
                    </tr>
                  ";
                }*/
              ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>