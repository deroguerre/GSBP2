<?php
  session_start();
  if(!isset($_SESSION['email'], $_SESSION['password']))
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
    <link href="css/custom2.css" rel="stylesheet">

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
        
          editable: true,
          
          aspectRatio: 2.1,
          
          events: "json-events.php",
          
          eventDrop: function(event, delta) {
            alert(event.title + ' was moved ' + delta + ' days\n' +
              '(should probably update your database)');
          },
          
          loading: function(bool) {
            if (bool) $('#loading').show();
            else $('#loading').hide();
          }
          
        });
        
      });

    </script>
    
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
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href='dashboard.php'>Dashboard</a></li>
            <li class='active'><a href='#'>Planning</a></li>
            <li><a href='#'>Profil</a></li>
            <li><a href='contact.php'>Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div id="menu-gauche" class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href='#'>essai01</a></li>
            <li><a href='#'>essai02</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href='#'>essai03</a></li>
            <li><a href='#'>essai04</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Planning</h1>
      <div id='calendar'></div>
    </div>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>