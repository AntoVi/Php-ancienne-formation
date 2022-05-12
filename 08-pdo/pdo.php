<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>08 - PDO - PHP DATA OBJECT</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-4">08 - PDO - PHP DATA OBJECT</h1>

        <h4 class="mt-3">01. PDO: CONNEXION BDD</h4><hr>

        <?php 
        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]);

        echo '<pre>'; var_dump($pdo); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

        /*
            PDO est une classe prédéfinie en PHP permettant de se connecter à une base de données. PDO contient des méthodes (fonctions) permettant de dialoguer/communiquer avec la base de données.
            $pdo est objet/enfant/exemplaire issu de la classe PDO, c'est à travers cet objet que nous pouvons atteindre des méthodes (fonctions) permettant d'executer des requetes SQL en BDD
            Arguments de la classe PDO : 
            1. Nom du serveur (mysql)
            2. Hôte, adresse http du serveur (localhost)
            3. Nom de la BDD (entreprise)
            4. Identifiant (root)
            5. Mot de passe (vide sur pc, root sur Mampp)
            6. Options PDO (alert warning, encodage en utf8 dans la BDD etc...)

            Array
            (
                Liste des méthodes (fonctions) accessible via la classe PDO, donc via l'objet $pdo
                [0] => __construct
                [1] => beginTransaction
                [2] => commit
                [3] => errorCode
                [4] => errorInfo
                [5] => exec
                [6] => getAttribute
                [7] => getAvailableDrivers
                [8] => inTransaction
                [9] => lastInsertId
                [10] => prepare
                [11] => query
                [12] => quote
                [13] => rollBack
                [14] => setAttribute
            )
        */

        echo '<h4 class="mt-3">02. PDO: EXEC : INSERT - UPDATE - DELETE</h4><hr>';

        // Requete INSERTION
        // $insert = true;
        if(isset($insert)) // permet de bloquer la requete d'insertion afin d'éviter d'avoir une nouvelle ligne dans la table SQL à chaque fois que l'on recharge la page sur le navigateur
        {
            $r = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Grégory', 'LACROIX', 'm', 'PDG', '2021-11-03', 30000)");

            echo "Nombre d'enregistrement affectée par INSERT : <span class='badge bg-success'>$r</span><br>";
        }
        
        // Requete MODIFICATION
        // Exo : réaliser le traitement PHP + SQL permettant de modifier le salaire de l'employé 350 par 1200€
        $r = $pdo->exec("UPDATE employes SET salaire = 1200 WHERE id_employes = 350");

        echo "Nombre de modification affectée par UPDATE : <span class='badge bg-success'>$r</span><br>";

        // Requete SUPPRESSION
        // Exo : réaliser le traitement PHP + SQL permettant de supprimer l'employé 350
        $r = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");

        echo "Nombre de suppression affectée par DELETE : <span class='badge bg-success'>$r</span><br>";

        /*
            EXEC : méthode issue de la classe PDO permettant de formuler et d'executer des requetes SQL ne retournant pas de jeu de résultats (INSERT, UPDATE, DELETE)
            EXEC retourne le nombre d'enregistrements affectées par la requete SQL (ex: si une requete de modification modifie 15 lignes dans la BDD, exec retourne un integer de 15)
        */

        echo '<h4 class="mt-3">03. PDO: QUERY - SELECT - FETCH_ASSOC (1 seul résultat)</h4><hr>';

        // selection des données de l'employé n°388
        $r = $pdo->query("SELECT * FROM employes WHERE id_employes = 388");
        // $r est un objet issu d'une autre class prédéfinie en PHP :PDOStatement

        echo '<pre>'; var_dump($r); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($r)); echo '</pre>';

        // retourne un array indexé avec le nom des champs/colonnes de la table SQL 
        $employe = $r->fetch(PDO::FETCH_ASSOC);

        // retourne un array à la fois indexé avec le nom des champs/ colone et numériquement
        // $employe = $r->fetch(PDO::FETCH_BOTH);

        // retourne un array indexé numériquement
        // $employe = $r->fetch(PDO::FETCH_NUM);

        // retourne un objet issu de la classe StdClass avec comme indice des propriétés public de l'objet
        // $employe = $r->fetch(PDO::FETCH_OBJ);

        // retourne un array à la fois indexé avec le nom des champs/ colone et numériquement
        // $employe = $r->fetch();
        echo '<pre>'; print_r($employe); echo '</pre>'; 

        /*
            QUERY : méthode issue de la classe PDO permettant de formuler et d'executer des requetes SQL (INSERT, UPDATE, DELETE, SELECT)
            Quand on execute une requete de selection avec la méthode Query() sur l'objet PDO : 
            Succès : on obtient un autre objet issu d'une autre classe PDOStatement. Cet objet possède ses propres méthodes (fonctions)
            $r est inexploitable en l'état. Grace à la méthode FETCH issue de la classe PDOStatement, on récupère un résultat exploitable en règle général sous forme de tableau ARRAY
            $employe est le résultat exploitable, contient le résultat de la méthode FETCH, c'est à dire un ARRAY contenant les données de l'employé indexé avec le nom des champs/colonnes de la table SQL 'employes'

            Liste des méthodes de la classe PDOStatement accessible via l'objet $r
            Array
            (
                [0] => bindColumn
                [1] => bindParam
                [2] => bindValue
                [3] => closeCursor
                [4] => columnCount
                [5] => debugDumpParams
                [6] => errorCode
                [7] => errorInfo
                [8] => execute
                [9] => fetch
                [10] => fetchAll
                [11] => fetchColumn
                [12] => fetchObject
                [13] => getAttribute
                [14] => getColumnMeta
                [15] => nextRowset
                [16] => rowCount
                [17] => setAttribute
                [18] => setFetchMode
                [19] => getIterator
            )
        */

        echo '<h4 class="mt-3">04. PDO: QUERY - WHILE - SELECT - FETCH_ASSOC (plusieurs résultat)</h4><hr>';

        $r = $pdo->query("SELECT * FROM employes"); // 21 employés
        // $r -> objet PDOStatement

        echo '<pre>'; print_r($r); echo '</pre>'; 

        // La boucle WHILE retourne 1 ARRAY par tour de boucle contenant les données d'1 employé
        // Tant qu'il y a encore des lignes de résultats par rapport à la requete de selection, la boucle continue de tourner
        while ($employe = $r->fetch(PDO::FETCH_ASSOC)) 
        {
            echo '<pre>'; print_r($employe); echo '</pre>';

            echo '<div class="col-md-3 mx-auto alert alert-success text-center">';
                echo "Nom : $employe[nom]<br>";
                echo "Prénom : $employe[prenom]<br>";
                echo "Service : $employe[service]<br>";
                echo "Salaire : $employe[salaire]€<br>";
            echo '</div>';
        }

        // #############################################################################

        // Faites en sorte de ne pas avoir l'id_employes à l'affichage et afficher le sigle € juste après le salaire

        $pdoStatement = $pdo->query("SELECT * FROM employes"); 

        //    1 ARRAY par tour boucle 
        while($employe = $pdoStatement->fetch(PDO::FETCH_ASSOC))
        {
            // echo '<pre>'; print_r($employe); echo '</pre>';

            echo '<div class="col-md-4 mx-auto alert alert-info text-center">';
            //                  [id_employes] => 415
            foreach($employe as $key => $value)
            {
                if($key != 'id_employes')
                {
                    if($key == 'salaire')
                        echo "$key : $value €<br>";
                    else
                        echo "$key : $value<br>";
                }
            }
            echo '</div>';
        }

        echo '<h4 class="mt-3">04. PDO: QUERY - FETCH_ALL (plusieurs résultat)</h4><hr>';
        
        $pdoStatement = $pdo->query("SELECT * FROM employes");

        $employes = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        echo '<pre>'; print_r($employes); echo '</pre>';

        /*
            FETCH_ALL : méthode issue de la class PDOStatement, qui retourne un array multidimensionnel contenant des array indexé numériquement 
            Chaque ligne de résultat de la requete est indexé numériquement dans le tableau multidimensionnel

            Exo : afficher successivement les données du tableau multidimensionnel à l'aide de boucle 
            - 2 foreach 
            - 1 for / 1 foreach
        */

        //                   [1]  => ARRAY
        foreach($employes as $key => $tab)
        {
            echo '<div class="col-md-4 mx-auto alert alert-danger text-center">';
            //           [salaire] => 2300
            foreach($tab as $key2 => $value) 
            {
                echo "$key2 : $value<br>";
            }
            echo '</div>';
        }

        // ###################################################### 

        // La boucle for tourne autant de fois qu'il a d'éléments dans la tableau multi
        // On sert de la variable $i pour aller crocheter à chaque indice numérique dans le tableau multi
        //             < 24
        for($i = 0; $i < count($employes); $i++)
        {
            echo '<div class="col-md-4 mx-auto alert alert-warning text-center">';
            // 1er tour : $employes[0] 
            // 2ème tour : $employes[1]
            // 3ème tour : ...
            foreach($employes[$i] as $key => $value)
            {
                echo "$key : $value<br>";
            }
            echo '</div>';
        }

        echo '<h4 class="mt-3">05. PDO: QUERY - FETCH + BDD</h4><hr>';

        // Exo : afficher la liste des base de données. Puis les mettre dans une liste <ul> <li>
        // SHOW DATABASES

        $r = $pdo->query("SHOW DATABASES");

        echo '<pre>'; print_r($r); echo '</pre>';

        echo '<ul class="list-group">';
        while($bdd = $r->fetch(PDO::FETCH_ASSOC))
        {
            // echo '<pre>'; print_r($bdd); echo '</pre>';
            echo "<li class='list-group-item'>$bdd[Database]</li>";
        }
        echo '</ul><hr>';
        // ###############################################################################
        $r = $pdo->query("SHOW DATABASES");

        $bddAll = $r->fetchAll(PDO::FETCH_ASSOC);

        echo '<pre>'; print_r($bddAll); echo '</pre>';

        echo '<ul class="list-group">';
        foreach($bddAll as $tab)
        {
            foreach($tab as $value)
            {
                echo "<li class='list-group-item'>$value</li>";
            }
        }
        echo '</ul><hr>';

        ?>

    </div>
</body>
</html>