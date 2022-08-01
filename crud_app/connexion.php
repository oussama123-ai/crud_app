<?php 

    session_start(); // Démarrage de la session

    require_once 'configcon.php'; // On inclut la connexion à la base de données

      if(!empty($_POST['email']) && !empty($_POST['password'])) //conditions de verification si email et mots de passe existes 

    {

        $email = $_POST['email']; 
        $password = $_POST['password'];    

        $email = strtolower($email); // email transformé en minuscule        

        // On regarde si l'utilisateur est inscrit dans la table utilisateur et récupérer les informations

        $resultat = $connexion->prepare('SELECT * FROM Utilisateur WHERE email = ? ;');

        $resultat->execute(array($email));

        $data = $resultat->fetch();

            //Récupérer le nombre d'éléments que retourne la requête

        $NbreLignes = $resultat->rowCount();            

            // Si >0 alors l'utilisateur existe sinon (si 0 )la requête ne retourne aucun résultat et donc l'utilisateur n'existe pas

        if($NbreLignes >0)

        {

                  // Si le mail est correct au niveau format

            if(filter_var($email, FILTER_VALIDATE_EMAIL))

            {

                // Si le mot de passe est correct

                if($password==$data['password'])

                {

                    // On crée la session et on redirige sur accueil.php                  

                              echo $_SESSION['id']=$data['id']; //id de l'utilisateur

                              $_SESSION['psseudo']=$data['psseudo'];//psseudo de l'utilisateur
                              
                              $_SESSION['email']=$data['email'];//email de l'utilisateur

                              $_SESSION['date_inscription']=$data['date_inscription'];//date de l'inscription

                              header('Location: view.php');// On redirige vers la page view.php

                              exit;

                }else{ header('Location: index1.php?login_err=password'); die(); } //affichage des erreures 

                  }

            }                  

      }