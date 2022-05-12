<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>03 - POST - formulaire 1</title>
</head>
<body>
    <div class="container">

    <?php
   echo "<h1 class='display-4 text-center fst-italic'>Formulaire 3</h1><hr>";


   ?>

        <form method="post" class="col-md-6 mt-3" action="page_formu3.php">
        <div>
                <label for="marque" class="form-label">marque</label>
                <input type="text" id="marque" class="form-control" name="marque"> 
            </div>
          
            <div>
                <label for="modele" class="form-label">Modele</label>
                <input type="text " id="modele" class="form-control" name="modele">
            </div>
            <div>
                <label for="couleur" class="form-label">Couleur</label>
                <input type="text" name="couleur" id="couleur" class="form-control">
            </div>
           

            <div>
                <label for="km" class="form-label">km</label>
                <input type="text" name="km" id="km" class="form-control">
            </div>
            <div>
                <label for="carburant" class="form-label">Carburant</label>
                <input type="text" name="carburant" id="carburant" class="form-control">
            </div>
            <div>
                <label for="annee" class="form-label">Année</label>
                <input type="text" name="annee" id="annee" class="form-control">
            </div>
            <div>
                <label for="prix" class="form-label">Prix</label>
                <input type="text" name="prix" id="prix" class="form-control">
            </div>
         

            <div>
                <label for="puissance" class="form-label">puissance</label>
                <input type="text" name="puissance" id="puissance" class="form-control">
            </div>

            <div>
                <label for="option" class="form-label">Option</label>
                <input type="text" name="option" id="option" class="form-control">
            </div>

            <button type='submit' class="btn btn-danger mt-2" href="page_formu3.php">En savoir plus</button>

        </form>


       
       

    </div>
</body>
</html>