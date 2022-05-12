<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>06 - COOKIE - pays</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-5">06 - COOKIE - pays</h1>

        <?php 
        // Les données d'un fichier COOKIE sont accessible en PHP via la superglobale $_COOKIE
       

        // On entre dans la condition IF si un pays est passé dans l'URL, donc que nous avons cliqué sur un lien
        //          es
        if(isset($_GET['pays']))
        {
            $pays = $_GET['pays']; // es
        }
        echo  print_r($_GET);

        if(isset($_GET['pays2']))
        {
            $pays = $_GET['pays2']; // es
        }
        echo  print_r($_GET);

        ?>

        <h4>Votre langue :</h4>

        <a href="?pays=fr" class="btn btn-danger">France</a>
        <a href="?pays=es" class="btn btn-info">Espagne</a>
        <a href="?pays=en" class="btn btn-success">Angleterre</a>
        <a href="?pays=it" class="btn btn-warning">Italie</a>

        <a href="?pays2=fr" class="btn btn-danger">France</a>
        <a href="?pays2=es" class="btn btn-info">Espagne</a>
        <a href="?pays2=en" class="btn btn-success">Angleterre</a>
        <a href="?pays2=it" class="btn btn-warning">Italie</a>

    </div>
</body>
</html>