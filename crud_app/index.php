<!DOCTYPE html> 
<html lang="fr">
<head>
    <!-- En-tête de la page : type du document, encodage, titre de la page,,styles etc.-->
    <!-- données spécifiques au référencement de la page ainsi que l'encodage utilisé -->
    <title> Connexion </title><meta charset="UTF-8"> 
    <!-- lien vers page css (utilisation de bootstrap )-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>    
  <div class="login-form">            
      <!--definir la methode-->
            <form action="connexion.php" method="post">
                <!-- title-->
                <h2 class="text-center">Connexion</h2>      
                <!-- definir notre cadres des inputs on utilise toujour form-control pour la designe de cadre de l'input lorsque on met le curseur pour ecrire --> 
                <!--definir la forme de votre cadre de l'input email -->
                <!--email-->
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <!--definir la forme de votre cadre de l'input password -->
                <!--password-->
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <!-- bouton on utilise btn-primary pour afficher bouton avec color bleu et btn-block pour choisir la forme de visualisation -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <!-- class text-center pour centré le titre au niveau de notre page web-->
            <p class="text-center" style="color: #1c116d;"><a href="inscription.php">Inscription</a></p>
        </div>
        <!-- partie de style utiliser dans notre page web-->
        <style>
            /*construire le cadre de login */
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            /*pour definir le coleur de background de cadre de connexion */
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
            .form-group button {
                border-radius: 15px;
            }
        </style>
</body>
</html>