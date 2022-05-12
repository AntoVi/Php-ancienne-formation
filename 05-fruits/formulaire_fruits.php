<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>05 - FRUITS - formulaire fruits</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-5">05 - FRUITS - formulaire fruits</h1>

        <?php 
        /*
            1. Réaliser un formulaire permettant de selectionner un fruit (liste déroulante avec tout les fruits) et de saisir un poids 
            2. Réaliser le traitement permettant d'afficher le prix en passant par la fonction déclarée calcul()
            3. Faites en sorte de garder le dernier selectionné et le dernier poids saisi dans le formulaire lorsque celui-ci est validé
        */

        echo '<pre>'; print_r($_POST); echo '</pre>';

        require_once 'fonction.inc.php';

        // extract() : fonction prédéfinie permettant d'extraire les données d'un ARRAY dont les indices du tableau deviennent des variables
        extract($_POST); // $_POST['fruit'] --> $fruit

        if(isset($fruit) && isset($poids))
        {
            // On transmet à la fonction calcul(), le fruit et le poids selectionnés dans le formulaire
            echo '<p class="text-center my-4">' . calcul($_POST['fruit'], $_POST['poids']) . '</p>';
        }

        ?>

        <form method="post" class="col-md-4 mx-auto">
            <div class="mb-3">
                <select class="form-select" name="fruit">
                    <option>Selectionner un fruit</option>

                    <!-- Si l'indice 'fruit' est bien définit dans $_POST et qu'il a pour valeur "cerises", alors on affecte l'attribut 'selected' à la balise <option> -->
                    <option value="cerises" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == "cerises") echo 'selected'; ?>>Cerises</option>

                    <option value="bananes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == "bananes") echo 'selected'; ?>>Bananes</option>

                    <option value="pommes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == "pommes") echo 'selected'; ?>>Pommes</option>

                    <option value="peches" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == "peches") echo 'selected'; ?>>Pêches</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="poids" class="form-label">Poids</label>

                <!-- Si l'indice 'poids' dans $_POST est définit, cela veut dire que l'internaute a validé le formulaire, alors on affiche comme valeur par défaut dans la champ, le poids saisi dans le formulaire -->
                <input type="text" class="form-control" id="poids" name="poids" value="<?php if(isset($_POST['poids'])) echo $_POST['poids']; ?>">

            </div>
            <button type="submit" class="btn btn-dark">Calculer</button>
        </form>

    </div>
</body>
</html>
