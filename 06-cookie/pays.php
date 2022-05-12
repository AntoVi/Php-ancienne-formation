<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>06 - COOKIE - pays</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-5">06 - COOKIE - pays</h1>

        <?php 
        // Les données d'un fichier COOKIE sont accessible en PHP via la superglobale $_COOKIE
        echo '<pre>'; print_r($_COOKIE); echo '</pre>';

        // On entre dans la condition IF si un pays est passé dans l'URL, donc que nous avons cliqué sur un lien
        //          es
        if(isset($_GET['pays']))
        {
            $pays = $_GET['pays']; // es
        }
        elseif(isset($_COOKIE['pays'])) // on entre dans le elseif si un cookie est définit, ex: si nous quittons le site et revenons 1 mois plus tard, c'est la préférence sauvegardé dans le cookie qui sera visible sur le site
        {
            $pays = $_COOKIE['pays']; // es
        }
        else // On entre dans le ELSE à la toute première visite sur site, lorsqu'il n'y a pas de cookie crée et que nous n'avons cliqué sur aucun liens
        {
            $pays = 'fr';
        }

        // Création du cookie 

        // cette fonction retourne le nombre de seconde écoulée depuis le 1er janvier 1970 (date clé en informatique) jusqu'à maintenant. Ce nombre évolue sans cesse (jusqu'en 2038, problème d'octets...), cela nous permet d'avoir un repère dans le temps
        echo time();
        $un_an = 365*24*3600; // calcul d'1 an en secondes 

        // setcookie("nom_cookie", "valeur_cookie", "durée_de_vie")
        //                  es
        setcookie("pays", $pays, time()+$un_an);

        //      fr
        switch($pays)
        {
            case 'fr': 
                echo '<p class="alert alert-success text-center mx-auto col-md-6">Vous êtes sur un site en français</p>';
            break;
            case 'es': 
                echo '<p class="alert alert-success text-center mx-auto col-md-6">Vous êtes sur un site en espagnol</p>';
            break;
            case 'en': 
                echo '<p class="alert alert-success text-center mx-auto col-md-6">Vous êtes sur un site en anglais</p>';
            break;
            case 'it': 
                echo '<p class="alert alert-success text-center mx-auto col-md-6">Vous êtes sur un site en italien</p>';
            break;
        }

        /*
            Un fichier cookie est sauvegardé sur le pc de l'internaute et on y mettra des informations d'importance mineur, des préférences, des traces de visites (les derniers arctiles consultés, la langue préféré du site etc..)
            setcookie est une fonction prédéfinie permettant de créer un fichier cookie sur le pc de l'internaute visible dans les paramètres du navigateur
            Il n'exsite pas de fonction pour supprimer un fichier de cookie, c'est à la fin de sa durée de vie qu'il sera automatiquement supprimé
            Dans notre cas, le cookie a une durée de vie de 1 an, si l'internaute visite le site tous les 6 mois, le cookie sera renouvelé pour 1 an.
        */
        ?>

        <h4>Votre langue :</h4>

        <a href="?pays=fr" class="btn btn-danger">France</a>
        <a href="?pays=es" class="btn btn-info">Espagne</a>
        <a href="?pays=en" class="btn btn-success">Angleterre</a>
        <a href="?pays=it" class="btn btn-warning">Italie</a>

    </div>
</body>
</html>