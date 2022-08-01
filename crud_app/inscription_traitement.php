<?php 
    require_once 'configcon.php'; // On inclue la connexion à la base de données

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['psseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))// pour verifier que tous les champs sont existes 
    {
        // Déclaration de variables
        $psseudo = $_POST['psseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_retype = $_POST['password_retype'];

        // On vérifie si l'utilisateur existe
        $resultat = $connexion->prepare('SELECT psseudo, email, password FROM utilisateur WHERE email = ?');
        $resultat->execute(array($email));
        $data = $resultat->fetch();
        //Récupérer le nombre d'éléments que retourne la requête
        $NbreLignes = $resultat->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($NbreLignes == 0){ 
            if(strlen($pseudo) <= 100){ // On vérifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On vérifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mots de passe saisis sont bons
                          
                            // On insère dans la base de données
                            $insert = $connexion->prepare('INSERT INTO utilisateur(psseudo, email, password) VALUES(:psseudo, :email, :password)');
                            $insert->execute(array( 
                                'psseudo' => $psseudo,
                                'email' => $email,
                                'password' => $password)
                            );
                       // On redirige avec le message de succès 
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();} //erreur password si les deux mots de passe saisis sont  diff  
                    }else{ header('Location: inscription.php?reg_err=email'); die();} // erreur email mal former
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}//erreur longeur de l'email ne respecte pas containte
            }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}//erreur longeur de psseudo  ne respecte pas containte
        }else{ header('Location: inscription.php?reg_err=already'); die();}//erreur deplication compte
    }