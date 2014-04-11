<form id='formInscription' method='post' action='fonctions/addUser.php'>
  <h1 class="page-header">Inscription</h1>
    <div class='form-group'>
      <label for=''>Email</label>
      <input type='email' class='form-control' name='email' placeholder='exemple@gmail.com'>
    </div>
    <div class='form-group'>
      <label for=''>Mot de passe:</label>
      <input type='password' class='form-control' name='password' placeholder='***'>
    </div>
    <div class='form-group'>
      <label for=''>Nom</label>
      <input type='text' class='form-control' name='nom' placeholder='Deroguerre'>
    </div>
    <div class='form-group'>
      <label for=''>Prenom</label>
      <input type='text' class='form-control' name='prenom' placeholder='Guillaume'>
    </div>
    <div class='form-group'>
      <label for=''>Adresse</label>
      <input type='text' class='form-control' name='adresse' placeholder='3-5 D rue des capucins'>
    </div>
    <div class='form-group'>
      <label for=''>Ville</label>
      <input type='text' class='form-control' name='ville' placeholder='Lyon'>
    </div>
    <div class='form-group'>
      <label for=''>Code Postal</label>
      <input type='text' class='form-control' name='cp' placeholder='69001'>
    </div>
    <button type='submit' class='btn btn-default'>S'inscrire</button>
</form>

<!--<script>
  $(function() {
    $('#formInscription').submit(function() {
      email = $(this).find("input[name=email]").val();
      
      $.post("fonctions/addUser.php", {mail: mail}, function(data) {
        alert(data);
      });
      
      //empeche la soumission du formulaire
      return false;
    });
  });
</script>-->