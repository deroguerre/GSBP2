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
    <header>
      <?php include('templates/header.html'); ?>
    </header>
    
    <nav>
      <?php include('templates/nav.html'); ?>
    </nav>
    
    <div class="container">
      
      <script>

        var Lundi = new Date(firstMonday('03','2014'));
 
        //alert(Lundi.getDate());
        
        document.getElementById('2emeLundi').innerHTML +="bienvenue"; 
        
        
      </script>
      <table id="planning" border="1px">
        <tr>
          <th class=''>Lundi</th>
          <th class=''>Mardi</th>
          <th class=''>Mercredi</th>
          <th class=''>Jeudi</th>
          <th class=''>Vendredi</th>
          <th class=''>Samedi</th>
          <th class=''>Dimanche</th>
        </tr>
        <tr id='semaine1'>
          <td id='1erLundi'></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id='semaine2'>
          <td id='2emeLundi'></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id='semaine3'>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id='semaine4'>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id='semaine5'>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr id='semaine6'>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
    

    <footer>
      <?php include('templates/footer.html'); ?>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>