<?php
echo "<h1 class='display-4 text-center fst-italic'>Formulaire 4</h1><hr>";
echo '<pre>'; print_r($_POST); echo '</pre>';

if(isset($_POST['pseudo']) &&  isset($_POST['password']) &&  isset($_POST['email']))
{
    $border = 'border border-danger';

    if(iconv_strlen($_POST['pseudo']) < 3 || iconv_strlen($_POST['pseudo']) > 10)
    {
        $errorPseudo = "<small class='fst-italic text-danger'>pseudo non valide (entre 3 et 10 caractères)</small>";
    }
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

    <title>03 - POST - formulaire 1</title>
</head>
<body>
    <div class="container">

   


        <form method="post" class="col-md-6">
            <div>
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text"   class="form-control" <?php if(isset($errorPseudo)) echo $border;   ?> id="pseudo" name="pseudo" > 
                <?php if(isset($errorPseudo)) echo $errorPseudo; ?>
            </div>
            <div>
                <label for="password" class="form-label">Mot de Passe</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email " id="taille" class="form-control" name="email">
            </div>
     
            
            <button type="submit" class="btn btn-danger col-md-8 mt-2"> Envoyer</button>

        </form>
       
       

    </div>
</body>
</html>