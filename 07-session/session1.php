<?php 
// fonction prédéfinie permettant de créer un fichier de session sur le serveur xampp
session_start();

// $_SESSION : superglobale PHP permettant d'avoir accès aux données stockés dans le fichier de session, c'est une variable de type ARRAY accessible de partout (espace local et global)

$_SESSION['pseudo'] = 'GregFormateur';
$_SESSION['nom'] = 'LACROIX';
$_SESSION['prenom'] = 'Grégory';

unset($_SESSION['pseudo']); // permet de vider une partie de la session

/*
    contenu stocké dans le fichier de session (json)
    pseudo|s:13:"GregFormateur";nom|s:7:"LACROIX";prenom|s:8:"Grégory";
*/

echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Fonction permettant de supprimer un fichier de session
// session_destroy();

