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
    
    <!-- FullCalendar -->
    <link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
    <link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='lib/jquery.min.js'></script>
    <script src='lib/jquery-ui.custom.min.js'></script>
    <script src='fullcalendar/fullcalendar.min.js'></script>
    <script>

      $(document).ready(function() {
      
        $('#calendar').fullCalendar({
        
          aspectRatio: 2.1,
          
          events: "fonctions/eventsToCalendar.php",
          
          editable: true,
          
          //Déplacement des evenements
          eventDrop: function(event, delta) {
            start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
            end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
            var user_id = "<?php echo $_SESSION['id']?>";
            //Envoie les informations via ajax
            $.ajax({
              url: 'http://127.0.0.1/GSBP2/fonctions/updateEventFromCalendar.php',
              data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id +'&user_id='+ user_id +'&confirm='+ event.confirm + '&color='+ event.color ,
              type: "POST",
              success: function(json) {
                alert("Déplacement enregistré");
              }
            });
          },
          
          
          ///////////////////////////////////////////////
          
          selectable: true,
          
          selectHelper: true,
          
          //Création d'évènements
          select: function(start, end, allDay) {
            var title = prompt('Nouvel évènement:');
            var user_id = "<?php echo $_SESSION['id']?>";
            if (title) {
            start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
            end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
            $.ajax({
              url: 'http://127.0.0.1/GSBP2/fonctions/addEventFromCalendar.php',
              data: 'title='+ title+'&start='+ start +'&end='+ end +'&user_id='+ user_id ,
              type: "POST",
              success: function(json) {
                location.reload();
            }
            });
            calendar.fullCalendar('renderEvent',
            {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
            true // make the event "stick"
            );
            }
            calendar.fullCalendar('unselect');
          }
          ///////////////////////////////////////////////////
        });
      });

    </script>
    
  </head>
  <body>
  
    <!-- Include la barre de navigation -->
    <?php require_once('templates/nav.html') ?>
    
    <!-- MENU DE GAUCHE -->
    <div id="menu-gauche" class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id='calendrier' class='active'><a href='#'>Calendrier</a></li>
            <li id='allEvents'><a href='allEvents.php'>Événements</a></li>
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
    
    <!-- CONTAINER -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Planning</h1>
      <div id='main'>
        <div id='calendar'></div>
      </div>
    </div>
    
    <!-- ///////////// JAVASCRIPT ///////////// -->
    
    <!-- Active le visuel -->
    <!--<script>
      var btnMenu = document.getElementById('planning');
      btnMenu.className='active';
    </script>-->
    
    <!--<script>
      //recharge la page du calendrier
      $(document).ready(function() {
        $('#calendrier').click(function() {
          location.reload();
        });
        //Charge la page 'Événements'
        $('#allEvents').click(function() {
          $('#main').load('allEvents.php');
          btnCalendar = document.getElementById('calendrier');
          btnAllEvents = document.getElementById('allEvents');
          btnCalendar.className='';
          btnAllEvents.className='active';
        });
      });
    </script>-->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>