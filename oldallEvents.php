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
          session_start();
          require_once('class/event.class.php');
          $evenement = new CEvents();
          //$evenement->getAllEventsOfService();

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