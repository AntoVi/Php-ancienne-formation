<?php 

    // 1. Réaliser un formulaire d'inscription avec les champs suivants : 
    //     nom, prenom, mot de passe (password), confirmer mot de passe (confirm_password), email, telephone, adresse, ville , code postal (code_postal) et un bouton de validation 'submit'

    // 2. Contrôler en PHP que l'on receptionne toute les données saisie dans le formulaire (print_r)
    echo '<pre>'; print_r($_POST); echo '</pre>';

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email']) && isset($_POST['telephone'])
     && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['code_postal']))
    {   
        $border = 'border border-danger';

        // 3. Faites en sorte d'informer l'internaute si le mot de passe n'est pas compris entre 2 et 40 caractères
        if(iconv_strlen($_POST['password']) < 2 || iconv_strlen($_POST['password']) > 40)
        {
            $errorPassword = "<small class='fst-italic text-danger'>Mot de passe non valide (entre 2 et 20 caractères)</small>";

            $error = true;
        }
        elseif($_POST['password'] != $_POST['confirm_password']) // 4. Faites en sorte d'informer l'internaute si les mot de passe ne correspondent pas
        {
            $errorPassword = "<small class='fst-italic text-danger'>Vérifier les mots de passe</small>";

            $error = true;
        }

        // 5. Faites en sorte d'informer l'internaute si le champ 'ville' est laissé vide
        if(empty($_POST['ville']))
        {
            $errorVille = "<small class='fst-italic text-danger'>Merci de saisir votre ville.</small>";

            $error = true;
        }

        // 6. Faites en sorte d'informer l'internaute si le format de l'email n'est pas valide (filter_var)
        // Si la valeur du champ 'email' N'EST PAS (!) du bon filtre / format (filter_var), alors on entre dans la condition IF et on affiche un message d'erreur utilisateur
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $errorEmail = "<small class='fst-italic text-danger'>Merci de saisir un email valide (ex: exemple@gmail.com).</small>";

            $error = true;
        }

        // 7. Faites en sorte d'informer l'internaute si le code postal n'est pas de type numeric (is_numeric) et si sa taille est différente de 5 caractères
        if(!is_numeric($_POST['code_postal']) || iconv_strlen($_POST['code_postal']) != 5)
        {
            $errorCp = "<small class='fst-italic text-danger'>Merci de saisir un code postal valide.</small>";

            $error = true;
        }
        
        // 8. Afficher un message de validation si l'internaute a correctement remplit le formulaire

        // Si la variable $error N'EST PAS DEFINIT, cela veut dire que l'internaute n'est entré dans aucune des condiditons IF de contrôle ci-dessus, alors il a correctement remplit le formulaire, on entre dans le IF
        // La variable $error n'est définit que lorsque l'internaute a fait une erreur de saisie dans le formulaire
        if(!isset($error))
        {
            // requete SQL d'insertion

            $valid = "<p class='alert alert-success col-md-6 mx-auto text-center my-3'>Féliciations ! Vous êtes maintenant inscrit sur le site !</p>";
        }
    }

    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>03 - POST - formulaire 2</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-4">Créer votre compte</h1>

        <!-- Si la variable $valid est définit, l'internaute a coorectement rempplit le formulaire, alors on affiche le message de validation contenu dans $valid -->
        <?php if(isset($valid)) echo $valid; ?>

        <form method="post" class="row col-md-10 mx-auto g-3">
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">mot de passe</label>
                <input type="text" class="form-control <?php if(isset($errorPassword)) echo $border; ?>" id="password" name="password">

                <!-- Si la variable $errorPassword est définit, cela veut dire que l'internaute a fait une erreur de saisi et est entré dans la condition IF de contrôle, alors on affiche le message d'erreur -->
                <?php if(isset($errorPassword)) echo $errorPassword; ?>
            </div>
            <div class="col-md-6">
                <label for="confirm_password" class="form-label">Confirmer votre mot de passe</label>
                <input type="text" class="form-control" id="confirm_password" name="confirm_password">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <!-- Si la variable $errorEmail est définit, cela veut dire que l'internaute a saisi un mauvais format email, alors on affecte la classe 'border border-danger' contenu dans $border au champ input -->
                <input type="text" class="form-control <?php if(isset($errorEmail)) echo $border; ?>" id="email" name="email">
                <?php if(isset($errorEmail)) echo $errorEmail; ?>
            </div>
            <div class="col-md-6">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone">
            </div>
            <div class="col-md-6">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse">
            </div>
            <div class="col-md-4">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control <?php if(isset($errorVille)) echo $border; ?>" id="ville" name="ville">
                <?php if(isset($errorVille)) echo $errorVille; ?>
            </div>
            <div class="col-md-2">
                <label for="code_postal" class="form-label">Code postal</label>
                <input type="text" class="form-control <?php if(isset($errorCp)) echo $border; ?>" id="code_postal" name="code_postal">
                <?php if(isset($errorCp)) echo $errorCp; ?>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Continuer</button>
            </div>
        </form>

    </div>
</body>
</html>