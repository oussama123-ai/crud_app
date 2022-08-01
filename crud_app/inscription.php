<!DOCTYPE html>
    <html lang="fr"><!--definir languge de votre moteur de recherche-->
        <head>
            <!-- En-tête de la page : type du document, encodage, titre de la page,,styles etc.-->
            <!-- données spécifiques au référencement de la page ainsi que l'encodage utilisé -->
            <meta charset="UTF-8">   
            <!-- lien vers page css (utilisation de bootstrap )-->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <title>Inscription</title>
        </head>
        <body>
         <!-- contruire votre cadre d'inscription qui'est centré au niveau de page web : emplacement et designe de votre petit cadre d'inscription -->
        <div class="login-form">
            <!--part de verification des erreure -->
        <?php 
                if(isset($_GET['reg_err'])) //verifier l'existance de variable reg_err 
                {
                    $erreur = $_GET['reg_err']; // on va enregistreé notre variable dans erreur 
                    //selon la valeur de l'errure on va afficher un message 
                    switch($erreur) 
                    {
                        case 'success':// inscription sans errure valider
                        ?>
                        <!--classe permet d'ajouter une visualisation de successe au niveau de cadre d'affichage de message avec coleur vert-->
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password': // errure au niveau de mots passe 
                        ?>
                        <!--classe permet d'ajouter une visualisation d'errure au niveau de cadre d'affichage de message avec coleur rouge-->
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email': //errure au niveau de l'email ne respecte pas le norme d'un email
                        ?>
                        <!--classe permet d'ajouter une visualisation d'errure au niveau de cadre d'affichage de message avec coleur rouge-->
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length': //errure au niveau de la longeur de l'email 
                        ?>
                            <!--classe permet d'ajouter une visualisation d'errure au niveau de cadre d'affichage de message avec coleur rouge-->
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'psseudo_length': //erreur au niveau de psseudo  
                        ?>
                        <!--classe permet d'ajouter une visualisation d'errure au niveau de cadre d'affichage de message avec coleur rouge-->
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already'://erreur de deplication de compte
                        ?>
                         <!--classe permet d'ajouter une visualisation d'errure au niveau de cadre d'affichage de message avec coleur rouge-->
                            <div class="alert alert-danger"> 
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?> 
            <!-- definir la methode a travers fichier inscription_traitement.php-->
            <form action="inscription_traitement.php" method="post">
                <!--definir titre centré dans le cadre de l'inscription-->
                <h2 class="text-center">Inscription</h2>   
                <!-- definir notre cadres des inputs on utilise toujour form-control pour la designe de cadre de l'input lorsque on met le curseur pour ecrire -->     
                <!--definir la forme de votre cadre de l'input psseudo -->
                <div class="form-group">
                    <input type="text" name="psseudo" class="form-control" placeholder="Psseudo" required="required" autocomplete="off">
                </div>
                <!--definir la forme de votre cadre de l'input email -->
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <!--definir la forme de votre cadre de l'input password -->
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <!--definir la forme de votre cadre de l'input password_retype -->
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <!--definir la forme de votre bouton  -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
        </div>
        <!--definir les style utiliser dans la construction de cette page web-->
        <style>
            /*construire le cadre de l'inscription qu'est centré dans vptre page web */
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            
            /*pour definir le coleur de background de cadre de l'inscription */
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            /*determiner position de titre h2*/
            .login-form h2 {
                margin: 0 0 15px;
            }
            /*determiner le position et le bordure pour les inputs et le bouton*/
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            /*caracteriser le taille de bouton*/
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        </body>
</html>