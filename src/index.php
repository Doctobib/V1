<?php session_start(); 

if(isset($_SESSION['identifiant']) || !empty($_SESSION['identifiant'])){
  if($_SESSION['identifiant'] == "admin")
  {
    header('location: admin.php');
    die();
  }
  header('location: profil.php');
  die();
}

?>
<?php
$titre_page = "Acceuil";
include 'inc/header.php';
?>

<div class="container-fluid">

  <div class="row">
  
    <div class="col-md-6 col-sm-6">
      <h2 class="jumbotron text-center" style="background-color: white;">
      Bienvenue
      </h2>
      <h3 class="jumbotron text-center" style="background-color: white;">
      Site des consultation en ligne pour diagnostique médical
      <a class="btn btn-success btn-lg" href=diag.php>Commencer</a>
      </br></br> 
      N'oubliez pas de creer un compte en cliquant sur créer compte.
      </h3>
    </div>
  
    <div class="col-md-4 col-sm-6">
      <form action="login.php" method="post" class="well">
        <h1> Connexion </h1>
        <div class="form-group">
          <label for="identifiant">Identifiant</label>
          <input type="input" class="form-control" name="identifiant">
        </div>
        <div class="form-group">
          <label for="mot_de_passe">Mot de passe</label>
          <input type="password" class="form-control" name="mot_de_passe">
        </div>
        <button type="submit" class="btn btn-primary" name="se_connecter">Se connecter</button>
      </form>
    </div>
  
  </div>

</div>

<?php include 'inc/footer.php' ?>