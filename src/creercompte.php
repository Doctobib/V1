<?php session_start(); ?>
<?php
$titre_page = "Creer un compte";
include 'inc/database.php';
require_once 'inc/functions.php';
if(   !empty($_POST['num_ss'])
   && !empty($_POST['email'])
   && !empty($_POST['mot_de_passe'])
   && !empty($_POST['verifier_mot_de_passe']))
{
    $num_ss = $_POST['num_ss'];
    $email = $_POST['email'];
    $mot_de_passe = md5($_POST['mot_de_passe']);

    if(verifier_compte_existe($num_ss, $email)){
      echo "num_ss ou mail déja existant </br>";
    }else{
      enregistrer_compte($num_ss, $email, $mot_de_passe);
      echo "compte enregistré </br>";
    }
}
?>

<?php include 'inc/header.php'?>
        <div class="container">
            <form action="creercompte.php" method="post" class="well col-md-6" autocomplete="off">
                <h1>Devenez membre </h1>
                <div class="form-group">
                    <label for="num_ss">Numero de sécurité sociale</label>
                    <input type="input" value="" class="form-control" name="num_ss">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" value="" class="form-control" name="mot_de_passe">
                </div>

                <div class="form-group">
                    <label for="verifier_mot_de_passe">Verifier mot de passe</label>
                    <input type="password" value="" class="form-control" name="verifier_mot_de_passe">
                </div>
                <button type="submit" class="btn btn-primary" name="creer un comte">Creer un compte</button>
            </form>
        </div>

<?php include 'inc/footer.php' ?>
