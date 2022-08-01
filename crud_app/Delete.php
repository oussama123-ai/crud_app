<?php 
include_once("config.php"); // On inclut la connexion à la base de données

  $cin = $_GET['cin']; //importer champs cin pour faire request 
  $DelSql = "DELETE FROM apprenants WHERE cin=$cin";// request de supprission d'unapprenant 

  $res = mysqli_query($con, $DelSql); // resultat de request 
  if ($res) {
    header("Location: view.php"); // retoure vers page view on cas de succeés
  }else{
    echo "Failed to delete";  // cas de failed 
  }

 ?>