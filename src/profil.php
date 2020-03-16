<?php 
session_start(); 
if(!isset($_SESSION['identifiant']) || empty($_SESSION['identifiant'])){
	header('location: index.php');
	die();
}
$numss = $_SESSION['identifiant'];
include 'inc/database.php';
require_once 'inc/functions.php';
?>
<?php $titre_page = "Page de profile" ?>
<?php 
include 'inc/header.php';
?>

<div class="well container" style="background-color: white;">
  <div class="col-md-6">
  	<h3 class="jumbotron text-center">
  		Votre numéro de sécurité sociale </br></br> <?php echo $numss?>
  	</h3>
  	<div class="text-center">
  		<a class="btn btn-success btn-lg" href=demandeAvis.php> Demander un avis médicale</a>
  	</div>
  </div>
  <div class="col-md-6">
  	  <div class="text-center">
  		<h3>Vos derniers messages</h3>
      <div id="db_users">
        <?php print_db_users($numss); ?>
      </div>
  	</div>
  </div>
</div>

<?php include 'footer.php' ?>