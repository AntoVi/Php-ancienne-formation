<?php 
require_once('inc/header.inc.php');
include('inc/nav.inc.php');

/*
    include() et require() sont des focntions prédéfinies permettant d'inclure des fichiers dans d'autre fichiers
    Il n'y aucune différence entre les deux... sauf en cas d'erreur sur le nom du fichier : 
        - include génère une erreur et continue l'execution du script 
        - require génère une erreur et stop l'execution du script

    le once vérifie si le fichier a déjà été inclus, si c'est le cas, il ne le ré-inclus pas
*/
?>
        
    <main class="border border-secondary text-center p-4">
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
        <p>Voici le contenu de la page Home</p>
    </main>

<?php 
require('inc/footer.inc.php');
