<?php 
// paramètres de la base de données
    $host='localhost'; 
    $sgbdname='mysql'; 
    $username = 'root'; 
    $password = ''; 
    $dbname='ctformation'; 
    $charset='utf8'; 
    
    Try { 
        $connexion = new PDO($sgbdname.':host='.$host.';dbname='.$dbname.';charset='.$charset, $username, $password); //connectée à notre base de donneé
        }        
    catch(PDOException $e) {
      echo 'Echec de la connexion : '. $e->getMessage();//récupérer le message d'erreur
      die();//permet d’arrêter proprement l’exécution du script en cas d’erreur
        } 
?>