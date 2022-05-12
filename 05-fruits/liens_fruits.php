<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>05 - FRUITS - liens fruits</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-5">05 - FRUITS - liens fruits</h1>

        <?php 
        /*
            1. Réaliser 4 liens HTML pointant sur la même page avec le nom des fruits <a></a>
            2. Faites en sorte d'envoyer "cerises" dans l'URL si l'on cliqué sue le lien "cerises". (faites la même chose avec tous les fruits)
            3. Tenter d'afficher "cerises" sur la page Web si on a cliqué sur le lien "cerises" (si "cerises" est passé dans l'URL par conséquent, faire le même chaose avec tous les fruits)
            4. Envoyer l'information à la fonction déclarée calcul() afin d'afficher le prix d'1kg de "cerises"
        */

        // $_GET : permet de stocker les données transmise dans l'URL
        echo '<pre>'; print_r($_GET); echo '</pre>';

        require_once 'fonction.inc.php';

        if(isset($_GET['choix']))
        {
            // Exo 3 :
            echo "<p class='text-center'>Vous avez choisi les <span class='badge bg-info'>$_GET[choix]</span></p>";

            // Exo 4 :
            // On transmet à la fonction le fruit envoyé dans l'URL et donc disponible dans la superglobale $_GET
            echo '<p class="text-center">' . calcul($_GET['choix'], 1000) . '</p>';
        }
        ?>

        <div class="container text-center">

            <!--      indice=valeur -->
            <a href="?choix=cerises" class="btn btn-danger">Cerises</a>

            <a href="?choix=bananes" class="btn btn-success">Bananes</a>

            <a href="?choix=pommes" class="btn btn-info">Pommes</a>

            <a href="?choix=peches" class="btn btn-warning">Pêches</a>

        </div>

    </div>
</body>
</html>