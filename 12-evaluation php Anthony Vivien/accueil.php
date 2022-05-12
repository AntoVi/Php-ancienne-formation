<?php

require_once 'inc/init.inc.php';

$annonce = $bdd->query("SELECT * FROM advert ORDER BY id DESC limit 15");
 


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

    <title>Accueil</title>
</head>
<body>





 
<h1 class="display-4 text-center fst-italic"> ACCUEIL  </h1>

<h3 class=" text-center fst-italic"> VOICI LES ANNONCES PRESENTES SUR LE SITE : </h3>

<table class = "table table-bordered text-center " >


<?php while($tb = $annonce->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
      
    <td><?= $tb['id'] ?> - <?= $tb['title'] ?> : <a href="page_article.php?id=<?= $tb['id'] ?>" class="btn btn-info">
                Consultez l'annonce
            </a> </td>

    </tr>
    <?php endwhile; ?>
    <tr>
    
    </tr>




</table>

<?

require_once 'inc/footer.inc.php';


 


?>


   
