<?php
$bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', 
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);


$annuaire = $bdd->query("SELECT * FROM annuaire");
$data = $annuaire->fetchALL(PDO::FETCH_ASSOC);

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
    if(isset($_GET['id_annuaire']) && !empty($_GET['id_annuaire']))
    {
        $delete = $bdd->prepare("DELETE FROM annuaire WHERE id_annuaire = :id_annuaire");
        $delete->bindValue(':id_annuaire', $_GET['id_annuaire'], PDO::PARAM_INT);
        $delete->execute();
    }
    else 
    {
        header('location: affichage_annuaire.php');
    }


}

// echo '<pre>'; print_r($data); echo '</pre>';


// traitement nb HOMME/ FEMME en bdd

$nbH = $bdd->query("SELECT * FROM annuaire WHERE sexe = 'm'");

$nbF = $bdd->query("SELECT * FROM annuaire WHERE sexe = 'f'");



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>09- TCHAT - Failles de sécurité </title>
</head>
<body>
    <div class="container">
        <h1 class="text-center"> LISTE DES ENTREES DANS L'ANNUAIRE</h1>
    <table class="table table-bordered text-center">
        <tr>
            <?php foreach($data[0] as $key => $value): ?>
                <th> <?= strtoupper($key) ?>  </th>
            <?php endforeach; ?>
            <th> DELETE USER </th>
            <th> EDIT USER </th>

        </tr>

     
            <?php foreach($data as $tab): ?>
                <tr>
               <?php foreach($tab as $key => $value): ?>
                    <td><?= $value; ?>  </td>
                <?php endforeach; ?>
               <td><a href="?action=suppression&id_annuaire=<?= $tab['id_annuaire'] ?>" class = "btn btn-danger" onclick= "return(confirm('voulez-vous supprimez cet utilisateur?'))">SUPPRIMER</a></td>
               <td><a href="?action=modification&id_annuaire=<?= $tab['id_annuaire'] ?>" class="btn btn-info text-white"> MODIFIER </a></td>
                </tr>
               
            <?php endforeach; ?>
           
       
    </table>
    <p><span>nombre d'homme :<?= $nbH->rowCount() ?></span></p>
    <p><span>nombre de femme :<?= $nbF->rowCount() ?></span></p>
  

    </div>
</body>
</html>