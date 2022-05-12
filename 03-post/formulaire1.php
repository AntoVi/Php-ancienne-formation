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

        <h1 class="display-4 text-center fst-italic">Formulaire 1</h1>

        <?php 
        echo '<pre>'; print_r($_POST); echo '</pre>';

        /*
            La superglobale $_POST permet de récupérer et stocker les données saisie dans un formulaire en PHP
            C'est un tableau ARRAY. Les indices du tableau correspondent aux attributs 'name' définit dans le formulaire

            Array
            (
                $key       $value
                [email] => gregorylacroix78@gmail.com
                [password] => efzfezefzef
            )

            Exo : afficher les données saisie dans le formulaire sur la page web avec un affichage conventionnel (echo) de 2 façons différentes : 
                - à l'aide d'une boucle
                - en allant piocher dans la superglobale avec les crochets []

            Sans la condition IF, au premier chargement de la page, nous avons 2 erreurs 'undefined', cela est dû au fait que nous n'avons pas validé le formulaire et par conséquent que les indices [email] et [password] ne sont pas détéctés.
            Si nous validons le fomulaires, les erreurs disparaissent, les indices [email] et [password] sont bien détéctés et stocker dans $_POST
            La condition IF permet de vérifier si les indices [email] et [password] sont bien définit.
            Donc on entre dans la condition IF seulement dans le cas où l'on a validé le formulaire et que $_POST contient les données saisie
        */

        if(isset($_POST['email']) && isset($_POST['password']))
        {
            // Avec une boucle
            // 1er tour     [email]  gregorylacroix78@gmail.com
            // 2ème tour [password]  efzfezefzef
            foreach($_POST as $key => $value)
            {
                echo "$key : $value<br>";
            }

            // En piochant dans la superglobale []
            echo "email : " . $_POST['email'] . '<br>';
            echo "password : $_POST[password] <br>";
        }

        

        // Il est possible d'apeller un ARRAY dans les guillemets "", mais il ne faut pas mettre les quotes '' à l'intérieur des crochets, ne fonctionne pas avec un tableau multidimensionnel
        ?>

        <!-- method : attribut HTML, comment vont circuler les données, 2 méthodes possible get (URL) ou post (via le formulaire) -->
        <form method="post" class="col-md-5 mx-auto">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
                <!-- Il ne faut surtout pas oublier les attributs 'name' sur chaque champ de saisi du formulaire, c'est ce qui nous permet de récupérer chaque valeur sasie en PHP -->
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-dark">Continuer</button>
        </form>

    </div>
</body>
</html>