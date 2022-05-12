<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>04 - GET - fiche produit</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-4">Détail produit</h1>

        <?php 
        echo '<pre>'; print_r($_GET); echo '</pre>';

        /*
            Les données transmises dans l'URL via un lien hypertexte <a></a> sont accessibles en PHP via la superglobale $_GET, c'est une variable de type ARRAY, accessible de partout

            Array
            (
                $key   $value
                [id] => 1
                [article] => jean
                [couleur] => bleu
                [prix] => 45
            )

            Exo : afficher les données transmises (echo) dans l'url sur la page Web de 2 façons différentes : 
                - à l'aide d'une boucle
                - en allant piocher dans le tableau avec les []
        */

        // La condition IF permet de contrôler si tout les indice dans l'URL sont bien définit, si c'est le cas on entre dans la condition IF
        if(isset($_GET['id']) && isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix']))
        {
            // Boucle FOREACH 
            // Exo : faites en sorte de ne pas avoir l'id 'id=1' affiché sur la page web

            echo '<div class="col-md-3 mx-auto text-center alert alert-success mb-3">';
            //                [article]    jean
            foreach($_GET as $key => $value)
            {
                // [article] 
                if($key != 'id')
                    echo "$key : $value<br>";
            }
            echo '</div>';

            // En piochant avec les crochets 
            echo '<div class="col-md-3 mx-auto text-center alert alert-info mb-3">';
                // echo "id : " . $_GET['id'] . "<br>";
                echo "article : $_GET[article]<br>";
                echo "couleur : $_GET[couleur]<br>";
                echo "prix : $_GET[prix]<br>";
            echo '</div>';
        }
        else // Sinon, tout les indices ne sont pas définit dans l'URL, on tombe dans le ELSE 
        {
            // fonction prédéfinie permettant d'effectuer une redirection
            // Si tout les indices ne sont pas définit dans l'URL, on redirige l'internaute vers la page boutique.php
            header('location: boutique.php');

            echo '<div class="alert alert-danger text-center mx-auto col-md-6">Eh Ducon !! T\'as finit de trafiquer l\'URL !!</div>';
        }
        ?>
        
    </div>
</body>
</html>