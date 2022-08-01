<?php 
  include_once("config.php");// On inclue la connexion à la base de données
  session_start();//started une session pour importé le champ psseudo de page de connexion 
  $ReadSql = "SELECT * FROM apprenants ";
  $res = mysqli_query($con,$ReadSql);//execution de request de selection
  $pss = $_SESSION['psseudo'];//utiliser pour geré l'utilisateur que faire l'ajout ou modification des coordonner d'un apprenant 
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
  <!-- lien vers page css style.css -->
  <link rel="stylesheet" href="style.css" >
</head>
<body>

  <?php   
    include 'navbar.php';//utilisation de file navbar 
   ?>
  
  <div class="container"><!--definir form general de page-->
    <div class="row pt-4">
      <h2>Crud App :Gérer votre Centre de Formation</h2><br/><!-- titre de votre page -->
      <h4>Bienvenue :<span style="color:#4937ce;"><?php echo ' '.$pss;?></span></h4><!-- include nom de l'utilisateur courant -->
      <a href="Ajouter.php"><!-- lien vers page de l'ajout on utilisation structure boutton-->
        <button class="btn btn-primary" type="submit">
          Ajouter un apprenant
        </button>
      </a>
    </div>

    <table class="table table-striped mt-3"><!-- definir les diff coloumns de votre table -->
      <thead>
        <tr>
          <th>Matricule:CIN</th>
          <th>Nom complet</th>
          <th>email</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <!--insertion des resultat de selection dans notre table Html-->
        <?php while ($r = mysqli_fetch_assoc($res)) {
        ?>

        <tr>
          <th scope="row"><?php echo $r['cin']; ?></th>
          <td><?php echo $r['first_name'] ." ". $r['last_name']; ?></td>
          <td><?php echo $r['email']; ?></td>

          <td><!-- definir des icon de update et delete -->
            <a href="update.php?cin=<?php echo $r['cin']; ?>" class="m-2">
              <i class="fa fa-edit fa-2x"></i><!-- icon existe par defaut dans bootstarp-->
            </a>
             <a href="Delete.php?cin=<?php echo $r['cin']; ?>"class="m-2">
              <i class="fa fa-trash fa-2x red-icon"></i><!-- icon existe par defaut dans bootstarp-->
            </a>
           
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>


  </div>
</body>
</html>