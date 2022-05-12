<?php

require_once 'inc/init.inc.php';




    $data = $bdd->query("SELECT * FROM advert");
       

require_once 'inc/nav.inc.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CONSULTEZ TOUTES LES ANNONCES</title>
</head>
<body>


    

        <h1 class="display-4 text-center fst-italic"> CONSULTEZ TOUTES LES ANNONCES  </h1>





<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
<!-- Après avoir selectionné tout dans la table advert on effectue un while sous la forme de card pour récupérer tous les tableaux -->
<?php while($tb = $data->fetch(PDO::FETCH_ASSOC)): 
       
?>

    <div class="col">
        <div class="card ">
            <div class="card-body">
                <h5 class="card-title text-center"> <?= $tb['title']; ?>  </h5>
                <h5 class="card-title text-center"> <?= $tb['reservation_message']; ?>  </h5>
                <p class="card-text text-center">
                    <a href="accueil.php" class="btn btn-primary my-2 ">Retournez à l'accueil</a>
                    <!-- Si le message de reservation dans la page page_article est écrit, il sera affiché réservé sinon on pourra consulté l'annonce -->
                    <?php if(isset($tb['reservation_message']) && !empty($tb['reservation_message'])): ?>
                    <p class="border border-danger rounded bg-danger text-center text-white p-2">Reservé</p>
                <?php else: ?>
                    <a href="page_article.php?id=<?= $tb['id'] ?>" class="btn btn-info"> Consultez l'annonce</a>
                <?php endif; ?>
                      
                </p>
            </div>
        </div>
    </div>

<?php endwhile; ?>

</div>


    
 

    
    
<?php

require_once 'inc/footer.inc.php';


 


?>

