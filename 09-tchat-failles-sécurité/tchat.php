<?php
/*

    exo : Espace de dialogue (tchat )
    1 . modélisation et création 
        BDD : tchat
        table : commentaire 
                id_commentaire // INT(11) - PK - AI
                pseudo          // VARCHAR(255)
                date_enregistrement // DATETIME
                message         // TEXT

    2. connexion à la BDD

    3.création du formulaire HTML (pour l'ajout de message, pas de champ pour la date, insertion automatique dans la BDD)
    4 Controller en PHP que l'on receptionne bien toute les données du formulaire (print_r)
    5. Requete SQL d'enregistrement (INSERT)
    6. Affichage des messages (SELECT)


*/

  //2 
  $pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', 
  [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
  ]);


   /*
            Failles XSS : cross site scripting en PHP
            C'est le fait d'insérer du code HTML directement dans un formulaire ou dans l'URL

            <style>
            body{
                display : none;
            }
            </style>

            <script>
            var point = true;
            while(point == true)
            alert("ton site c la d !!")

            </script>


            Injection SQL : 

            saisir cette injection dans le champ message
            ok '); DELETE FROM commentaire;(

    */



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



        <h1 class="display-4 text-center fst-italic"> 09- PDO - PHP DATA OBJECT  </h1>

      
        <?php
  
        if(isset($_POST['pseudo']) && isset($_POST['message']))
        {
            // exo 4 
            // foreach($_POST as $key => $value)
            // {
            //     echo "$key : $value<br>";
            // }

            // htmlspecialchars : fonction prédéfinie qui convertit chaque caractère spéciaux en entités
            // HTML, ex : < --> &lsaquo;

            //strips_tags : fonction prédéfini qui supprime complètement les balises HTML
            // addslashes : fonction prédéfinie permettant d'echapper chaque apostrophe dans la chaine de caractère
        // $_POST['pseudo'] = htmlspecialchars(strip_tags(addslashes(($_POST['pseudo'])));
        // $_POST['message'] = htmlspecialchars(strip_tags(addcslashes(($_POST['message'])));


        // on boucle $_POST afin d'automatiser le traitement ci-dessus
        foreach($_POST as $key => $value)
        {
            $_POST[$key] = htmlspecialchars(strip_tags(addslashes(($value))));
        }

                // exo 5 
        // $r = $pdo->exec("INSERT into commentaire (pseudo,date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");

        // $i -> objet PDOStatement 

        /*
            prepare(): méthode issue de la classe PDO qui permet de préparer une requette SQL et de parer 
            aux injections SQL

            :pseudo et : message sont des marqueurs nominatifs; que l'on peut comparer à des boites vides
            permettant d'enfermer des valeurs
            bindValue() : méthode issue de la classe PDOStatement permettant d'<envoyer><enfermer> <associer>
            une valeur  aux marqueurs nominatifs déclarés (:pseudo et :message)
            bindValue('nom_marqueur', 'valeur_marqueur', 'TYPE::MARQUEUR')
            execute() : méthode issue de la classe PDOStatement permettant d'executer une requete préparée

            dès que l'internaute a la possibilié d'injecter une donnée dans la BDD (formulaire ou URL), il 
            faudra à chaque fois préparer la requete SQL

        */
        $r = "INSERT INTO commentaire (pseudo,date_enregistrement, message) VALUES (:pseudo, NOW() ,:message)";
        $i = $pdo->prepare($r);
        $i->bindValue(':pseudo' , $_POST['pseudo'], PDO::PARAM_STR);
        $i->bindValue(':message' , $_POST['message'], PDO::PARAM_STR);
        $i->execute();


        header('location: tchat.php');

            
        }
        
        // exo 6
        $f = $pdo->query("SELECT * FROM commentaire");

        $commentaire = $f->fetchAll(PDO::FETCH_ASSOC);


          echo '<div class="d-flex flex-wrap   ">';
            foreach($commentaire as $key => $dab)
            
            {
                echo '<div class="col-md-4 mx-auto alert alert-danger text-center  ">';
               foreach($dab as $key2 => $value)
               
               {
               
                   if($key2 != "id_commentaire")
                   
                   {
                    
                    echo "$value<br>";
                    
                   }
                  
               }
               echo '</div>';
            }

            echo '</div>';
            
      
        
           
          
        ?>

        <?php

            echo "<p class = 'text-center'><span class = 'badge bg-info'>" . $f->rowCount() . "</span> message postés sur le tchat.</p>";
        ?>
        
        <form method="post" class= "col-md-6 mx-auto">
            <div>
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" id="pseudo" class="form-control" name="pseudo">
            </div>
            <div>
                <label for="message" class="form-label">Message</label>
               <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <button type ="submit" class="btn btn-danger mt-3 col-md-12">Envoyer</button>


        </form>
 

    </div>
</body>
</html>