<?php 
  include_once("config.php");// On inclue la connexion à la base de données
  session_start();//starter session 
  if (isset($_POST) && !empty($_POST)) {//verifier l'existance des inputs 
    $cin = ($_POST['cin']);//champ cin
    $nom = ($_POST['nom']);//champ nom
    $prenom = ($_POST['prenom']);//champ prenom
    $email = ($_POST['email']);//champ email
    $pss= $_SESSION['psseudo'] ; // champ psseudo 
    if ( !empty($cin) && !empty($nom) && !empty($prenom) && !empty($email) ){//request d'insertion dans notre base donnée
    $CreateSql = "INSERT INTO apprenants (cin, first_name, last_name, email,psseudo_usr)  VALUES('$cin','$nom', '$prenom', '$email','$pss') ";
    $res = mysqli_query($con, $CreateSql) or die(mysqli_error($con));//resultat de l'insertion 
    //message de verification resultat de l'insertion 
    $message = "Insertion reussi avec succès";
    }
    else{
      $erreur = "Erreur d'insertion à la base champs manquant "; //message d'erreur
    }
  }

 ?>


<!DOCTYPE html>
<html>
<head>
  <!-- En-tête de la page : type du document, encodage, titre de la page,,styles etc.-->
  <!-- données spécifiques au référencement de la page ainsi que l'encodage utilisé -->
  <title>Crud App PHP</title>
  <!-- lien vers page css (utilisation de bootstrap )-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- lien vers page style.css -->
  <link rel="stylesheet" href="style.css" >
</head>
<body>
  <?php   
    include 'navbar.php';//inclution de file navbar pour minimiser l'utilisation repetitive de  cette partie .php
   ?>
  <!-- contruire votre cadre d'inscription qui'est centré au niveau de page web : emplacement et designe de votre petit cadre d'ajouter apprenents -->
  <div class="container1">
    <div class="row pt-4">
      <!--pour signaler message de succes avec class "alert alert-success" -->
      <?php if (isset($message)) { ?>
        <div class="alert alert-success" role="alert" style="width: 540px;
    margin: 10px auto;">
          <?php echo $message; ?>
        </div> <?php } ?>
      <!--pour signaler message de danger avec class "alert alert-danger" -->
        <?php if (isset($erreur)) { ?>
        <div class="alert alert-danger" role="alert" style="width: 540px;
    margin:10px auto;">
          <?php echo $erreur; ?>
        </div> <?php } ?>
           <!-- definir la methode -->
      <form action="" method="POST" class="form-horizontal col-md-6 pt-4">
        <h2>Bienvenue dans Notre App:</h2><!--titre au dessus de cadre -->
        <div class="form-group"><!--pour designer cadre d'ecriture  cin-->
          <label for="input1" class="col-sm-2 control-label"style=" margin: 5px 20px 5px 20px">Matricule</label>
          <div class="col-sm-10"style=" width: 480px ; margin: 5px 20px 5px 20px ">
            <input type="text" name="cin" placeholder="cin" class="form-control" id="input1">
          </div>
        </div>
        <div class="form-group"><!--pour designer cadre d'ecriture nom -->
          <label for="input1" class="col-sm-2 control-label" style=" margin: 5px 20px 5px 20px">Nom</label>
          <div class="col-sm-10" style=" width: 480px ; margin: 5px 20px 5px 20px ">
            <input type="text" name="nom" placeholder="nom" class="form-control" id="input1">
          </div>
        </div>

        <div class="form-group"><!--pour designer cadre d'ecriture  prenom-->
          <label for="input1" class="col-sm-2 control-label"style=" margin: 5px 20px 5px 20px">prenom</label>
          <div class="col-sm-10"style=" width: 480px ; margin: 5px 20px 5px 20px ">
            <input type="text" name="prenom" placeholder="prenom" class="form-control" id="input1">
          </div>
        </div>

        <div class="form-group"><!--pour designer cadre d'ecriture email -->
          <label for="input1" class="col-sm-2 control-label"style=" margin: 5px 20px 5px 20px">Email</label>
          <div class="col-sm-10" style=" width: 480px ; margin: 5px 20px 5px 20px ">
            <input type="email" name="email" placeholder="e-mail" pattern ="[a-z0-9._-]+@[a-z]{2,}\.[a-z]{2,4}" class="form-control" id="input1">
          </div>
        </div>
        <div class="pt-4">
          <input type="submit" value="submit" class="btn btn-primary m-3"><!--pour boutton submit -->
          <a href="view.php"><!--pour designer boutton voir liste -->
            <button class="btn btn-success m-3" type="button">
              voir la liste
            </button>
          </a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>