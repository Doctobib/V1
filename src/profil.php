<?php 
session_start(); 
if(!isset($_SESSION['identifiant']) || empty($_SESSION['identifiant'])){
	header('location: index.php');
	die();
}
$numss = $_SESSION['identifiant'];
include 'inc/database.php';
require_once 'inc/functions.php';
$titre_page = "Page de profile";
$msgManager = new MessageManager($db);
if(isset($_POST['demander_avis']))
{
  if(!empty($_POST['specialite']) && !empty($_POST['description']) )
  {
      $specialite  = $_POST['specialite'];
      $description = $_POST['description'];
      $id_patient  = get_id_user($numss, "");
      $msg         = new Message(['id_patient' => $id_patient, 'specialite' => $specialite, 'description' => $description]);
      $msgManager->add_message($msg);
  }
}

include 'inc/header.php';
?>
<script>
  $("body").css("background-image","none");
</script>
<div class="well container-fluid" style="background-color: white;">
  
  <div class="col-md-9">
  
  	<div class="col-md-5 text-center">
      <form action="profil.php" method="post" class="well jumbotron">
        <div class="form-group">
          <label for="tri">Trier par :</label>
          <select class="form-control" id="specialite" name="tri">
            <option value="specialite">Specialité</option>
            <option value="date">Date</option>
          </select>
        </div>
        <button type="submit" class="btn btn-success" name="afficher_avis">Afficher</button>
      </form>

      <form action="profil.php" method="post" class="well jumbotron">
        <div class="form-group">
          <label for="specialite">Spécialité</label>
          <select class="form-control" id="specialite" name="specialite">
            <option value="generale">Générale</option>
            <option value="dentaire">Dentaire</option>
            <option value="ophtalmologie">Ophtalmologie</option>
            <option value="orl">ORL</option>
            <option value="pediaterie">Pédiaterie</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description et symtomes</label>
          <input type="text" class="form-control" name="description" required>
        </div>
        <button type="submit" class="btn btn-success" name="demander_avis">Demander un avis médicale</button>
      </form>
  	</div>
    
    <div class="text-center">
      <h3>Vos derniers messages</h3>
      <div id="db_users">
        <?php 
        $id_patient  = get_id_user($numss, "");
        if(isset($_POST['demander_avis']) || isset($_POST['afficher_avis']))
        {
          if( !empty($_POST['tri']) ){            
            $msgManager->print_messages_sorted($id_patient, $_POST['tri']);  
          }else{
            $msgManager->print_messages($id_patient);  
          }
        }
        ?>
       </div>
    </div>
  </div>

  <div class="col-md-3">

  <link rel="stylesheet" href="style/profil.css">
  <div class="card text-center">
    <h4 class="jumbotron text-center">
      Votre numéro de sécurité sociale : <?php echo $numss?>
    </h4>
    <img src="img/img_avatar_h.png" alt="Avatar" style="width:80%">
    <div class="container-fluid">
      <h4><b>Profil:</b></h4>
      <p>Nom : BOUZIDI</p>
      <p>Prénom : Darris</p>
      <p>Date de naissance : 14/11/2018</p>
      <h4><b>Coordonnées:</b></h4>
      <p>Tel : 06 xx xx xx xx</p>
      <p>Adresse : 21 rue catulienne, 93200 Saint Denis</p>
    </div>
  </div> 
  <button class="btn btn-success col-md-12" type="submit">Modifier</button>
  </div>
</div>

<?php include 'inc/footer.php' ?>