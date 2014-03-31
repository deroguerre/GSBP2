<?php
  session_start();
  if(!isset($_SESSION['email'], $_SESSION['password']))
  {
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
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
        
          editable: true,
          

          
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

  <div class="container">
    <header>
        <?php include('templates/header.html'); ?>
    </header>
      
    <div id='calendar'></div>
    
    <footer>
        <?php include('templates/footer.html'); ?>
    </footer>
  </div>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
