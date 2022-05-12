<?php

$bdd = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', 
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['profession']) && isset($_POST['ville']) && isset($_POST['code_postal']) 
&& isset($_POST['adresse']) && isset($_POST['date_de_naissance']) && isset($_POST['sexe']) && isset($_POST['description'])) 

{

$user = $bdd->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, code_postal, adresse, date_de_naissance, sexe, description)
VALUES (:nom,:prenom, :telephone, :profession, :ville, :code_postal, :adresse, :date_de_naissance, :sexe, :description)");
$user->bindValue(':nom' , $_POST['nom'], PDO::PARAM_STR);
$user->bindValue(':prenom' , $_POST['prenom'], PDO::PARAM_STR);
$user->bindValue(':telephone' , $_POST['telephone'], PDO::PARAM_STR);
$user->bindValue(':profession' , $_POST['profession'], PDO::PARAM_STR);
$user->bindValue(':ville' , $_POST['ville'], PDO::PARAM_STR);
$user->bindValue(':code_postal' , $_POST['code_postal'], PDO::PARAM_STR);
$user->bindValue(':adresse' , $_POST['adresse'], PDO::PARAM_STR);
$user->bindValue(':date_de_naissance' , $_POST['date_de_naissance'], PDO::PARAM_STR);
$user->bindValue(':sexe' , $_POST['sexe'], PDO::PARAM_STR);
$user->bindValue(':description' , $_POST['description'], PDO::PARAM_STR);
$user->execute();

header('location: annuaire.php');

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

    <title>tp repertoire </title>
</head>
<body>
    <div class="container">

    <form action="" method="post" class="mx-auto">
    <div class="col-md-4 text-center">
        <label for="nom" class = "form-label">Nom</label>
        <input type="text" id ="nom" name="nom" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="prenom" class = "form-label">Prénom</label>
        <input type="text" id ="prenom" name="prenom" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="telephone" class = "form-label">Telephone</label>
        <input type="text" id ="telephone" name="telephone" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="profession" class = "form-label">Profession</label>
        <input type="text" id ="profession" name="profession" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="ville" class = "form-label">Ville</label>
        <input type="text" id ="ville" name="ville" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="code_postal" class = "form-label">Code postal</label>
        <input type="text" id ="code_postal" name="code_postal" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="adresse" class = "form-label">Adresse</label>
        <input type="text" id ="adresse" name="adresse" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="date_de_naissance" class = "form-label">Date de naissance</label>
        <input type="date" id ="date_de_naissance" name="date_de_naissance" class = "form-control">
    </div>
    <div class="col-md-4 text-center">
        <label for="sexe" class = "form-label">Sexe</label>
        <select name="sexe" id="sexe" class= "form-select">
            <option value="m">Homme</option>
            <option value="f">Femme</option>
        </select>
    </div>
    <div class="col-md-4 text-center">
        <label for="description" class = "form-label">description</label>
        <textarea name="description" id="description" cols="30" rows="10 " class="form-control"></textarea>
    </div>

    <div>
        <button type = "submit" class = "btn btn-info mt-4">enregistrement</button>
    </div>






    </form>



    </div>
</body>
</html>