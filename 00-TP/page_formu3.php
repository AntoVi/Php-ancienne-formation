<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> fiche produit</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-4">Détail produit</h1>

        <?php 

if(isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['couleur']) && isset($_POST['km']) 
&& isset($_POST['carburant']) && isset($_POST['annee']) && isset($_POST['prix']) && isset($_POST['puissance']) && isset($_POST['option']))

{
    foreach($_POST as $key => $value)
    
    {
        echo '<div class="col-md-2  alert alert-danger text-center">';
        echo "$key : $value<br>";
        echo '</div>';
    }
   
}
     
        ?>
        
    </div>
</body>
</html>