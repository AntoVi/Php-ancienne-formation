<?php

require_once 'inc/init.inc.php';


//  
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $data = $bdd->prepare("SELECT * FROM advert WHERE id = :id");
    $data->bindValue(':id', $_GET['id'], PDO::PARAM_STR);
    $data->execute();

    
    $tb = $data->fetch(PDO::FETCH_ASSOC);

   
    
}

// On prépare la requete pour ajouter le message de réservation dans le formulaire ligne 62 

if(isset($_POST['reservation_message']) && !empty($_POST['reservation_message']))
{
  $message = $bdd->prepare("UPDATE advert SET reservation_message = :reservation_message WHERE id = :id");
  $message->bindValue(':reservation_message', $_POST['reservation_message'], PDO::PARAM_STR);
  $message->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $message->execute();

  header('location: accueil.php');

  

    
}


// echo '<pre>'; print_r($_POST); echo '</pre>';
 


require_once 'inc/header.inc.php';

?>

<h1 class="text-center my-5">Détails de l'annonce</h1>


<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h6 class="card-title"> <?= $tb['title']; ?> </h6>
    
    <p class="card-text"><?= $tb['description']; ?>.</p>
    <h6 class="card-subtitle mb-2 ">Code postal: <?= $tb['postal_code']; ?> </h6>
    <h6 class="card-subtitle mb-2 ">Ville: <?= $tb['city']; ?> </h6>
    <h6 class="card-subtitle mb-2 ">Type de l'annonce: <?= $tb['type']; ?></h6>
    <h6 class="card-subtitle mb-2 ">Prix: <?= $tb['price']; ?> </h6>
    <?php if(isset($tb['reservation_message']) && !empty($tb['reservation_message'])): ?>
                    <p class="border border-danger rounded bg-danger text-center text-white p-2">Reservé</p>
                <?php else: ?>
                    
                
    <form action="" method="post">
    <textarea name="reservation_message" id="reservation_message" cols="30" rows="5"></textarea>
    <button type ="submit" class = "btn btn-info my-2"> Je réserve </button>
    </form>
    <?php endif; ?>
    <a href="accueil.php" class="btn btn-primary my-2 ">Retournez à l'accueil</a>
    <a href="consultation.php" class="btn btn-info">Consultez toutes les annonces</a>
  </div>
</div>




<?php

require_once 'inc/footer.inc.php';


 


?>

