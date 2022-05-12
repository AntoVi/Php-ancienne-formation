<?php 

    // 1. Réaliser un formulaire HTML correspondant à la table SQL 'employes' avec les champs : prenom, nom, sexe, service, date_embauche, salaire et un bouton de validation submit

    // 2. Contrôler en PHP que l'on receptionne bien toute les données saisie dans le formulaire (print_r)
    echo '<pre>'; print_r($_POST); echo '</pre>';

    // 3. Connexion à la BDD 
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);

    // 4. Réaliser le traitement PHP + SQL permettant d'insérer un nouvel employé dans la BDD à la validation du formulaire 
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['sexe']) && isset($_POST['service']) && isset($_POST['date_embauche']) && isset($_POST['salaire']))
    {
        // On injecte dans les valeurs de la requete SQL, les données saisies dans le formulaire accessible via la superglobale $_POST
        $r = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]','$_POST[sexe]','$_POST[service]','$_POST[date_embauche]','$_POST[salaire]')");

        // 5. Afficher un message de validation après l'insertion
        $valid = "<p class='text-center'><span class='badge bg-success'>$r</span> employé a bien été enregistré</p>";
        $valid .= "<p class='col-md-6 mx-auto text-center alert alert-success my-2'>L'employé <strong>$_POST[prenom] $_POST[nom]</strong> a été enregistré avec succés !</p>";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>08 - PDO - formulaire entreprise</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-4">Ajouter un employé</h1>

        <?php if(isset($valid)) echo $valid; ?>

        <form method="post" class="col-md-7 mx-auto row g-3">
            <div class="col-md-6">
                <label for="sexe" class="form-label">Sexe</label>
                    <select id="sexe" class="form-select" name="sexe">
                        <option value="f">Femme</option>
                        <option value="m">Homme</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="col-md-6">
                <label for="service" class="form-label">Service</label>
                <input type="text" class="form-control" id="service" name="service">
            </div>
            <div class="col-md-6">
                <label for="date_embauche" class="form-label">Date embauche</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche">
            </div>
            <div class="col-md-6">
                <label for="salaire" class="form-label">Salaire</label>
                <input type="text" class="form-control" id="salaire" name="salaire">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark">Enregistrer</button>
            </div>
        </form>

    </div>
</body>
</html>