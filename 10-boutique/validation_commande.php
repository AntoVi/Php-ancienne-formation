<?php

require_once 'inc/init.inc.php';

if(!connect())
{
    header('location: connexion.php');
}
require_once 'inc/header.inc.php';
require_once 'inc/nav.inc.php';



?> 


<h4 class="text-center my-5">FELICITATION</h4>

<p class="text-center"> Votre commande n ° <strong> <?= $_SESSION['num_commande']  ?>  </strong>  a bien ete validée!   </p>


<p class="text-center">  Un mail de confirmation vous a été envoyé.  </p>


<?php

require_once 'inc/footer.inc.php';




?> 



