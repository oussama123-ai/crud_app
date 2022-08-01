<?php 
include_once("config.php");// On inclue la connexion à la base de données
session_start();//start session pour importer psseudo user
  $cin = $_GET['cin'];
  $selSql = "SELECT * FROM apprenants WHERE cin=$cin";
  $res = mysqli_query($con, $selSql);//execution de request 
  $r = mysqli_fetch_assoc($res);
  $pss = $_SESSION['psseudo'];//utiliser pour geré l'utilisateur que faire l'ajout ou modification des coordonner d'un apprenant 
  if (isset($_POST) & !empty($_POST)) {
    $cin= ($_POST['cin']); // champ cin
    $nom = ($_POST['nom']);//champ nom
    $prenom = ($_POST['prenom']); //champ prenom
    $email = ($_POST['email']); //champ email
    $UpdateSql = "UPDATE apprenants SET first_name='$nom',  last_name='$prenom', email='$email' ,psseudo_usr='$pss'  WHERE cin= $cin ";// update pour table apprenants 

    $res = mysqli_query($con, $UpdateSql);
    if ($res) {
      header("location: view.php");//orienté vers view 
    }else{
      $erreur = "la mise à jour a échoué.";//afficher l'erreur
    }
  }

 ?>


<!DOCTYPE html>
<html>
<head>
  <!-- En-tête de la page : type du document, encodage, titre de la page,,styles etc.-->
  <!-- données spécifiques au référencement de la page ainsi que l'encodage utilisé -->
  <title>Crud App</title>
  <!-- lien vers page css (utilisation de bootstrap )-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- lien vers page css style.css -->
  <link rel="stylesheet" href="style.css" >
</head>
<body>
  <?php   
    include 'navbar.php';//utilisation de file navbar 
   ?>

  <div class="container1"><!--definir form general de page-->
    <div class="row pt-4">
        <?php if (isset($erreur)) { ?>
        <div class="alert alert-danger" role="alert"style="width: 540px;
         margin: 10px auto;">
          <?php echo $erreur; ?>
        </div> <?php } ?>

      <form action="" method="POST" class="form-horizontal col-md-6 pt-4">
        <h2>Modifier Vos Coordonnées :</h2><!-- titre de votre page -->
        <div class="form-group"><!--definir structure de champ input-->
          <label for="input1" class="col-sm-2 control-label" style=" margin: 5px 20px 5px 20px">Matricule</label><!-- definir champ cin -->
          <div class="col-sm-10">
          <input type="text" name="cin" placeholder="cin" 
            class="form-control" id="input1"
            value="<?php  echo $r['cin']  ?>">
          </div>
        </div>
        <div class="form-group"><!--definir structure de champ input-->
          <label for="input1" class="col-sm-2 control-label"style=" margin: 5px 20px 5px 20px">Nom</label><!-- definir champ nom-->
          <div class="col-sm-10">
            <input type="text" name="nom" placeholder="Nom" 
            class="form-control" id="input1"
            value="<?php echo $r['first_name'] ?>">
          </div>
        </div>

        <div class="form-group"><!--definir structure de champ input-->
          <label for="input1" class="col-sm-2 control-label"style=" margin: 5px 20px 5px 20px">Prenom</label><!-- definir champ prenom-->
          <div class="col-sm-10">
            <input type="text" name="prenom" placeholder="prenom" class="form-control" id="input1"
            value="<?php echo $r['last_name'] ?>">
          </div>
        </div>

        <div class="form-group"><!--definir structure de champ input-->
          <label for="input1" class="col-sm-2 control-label"style=" margin: 5px 20px 5px 20px">Email</label><!-- definir champ email -->
          <div class="col-sm-10">
            <input type="email" name="email" placeholder="e-mail" class="form-control" id="input1"
            value="<?php echo $r['email'] ?>">
          </div>
        </div>

        <div class="pt-4">
          <input type="submit" value="submit" class="btn btn-primary m-3"><!-- definir boutton de submit  -->
          
        </div>
      </form>
    </div>
  </div>

</body>
</html>