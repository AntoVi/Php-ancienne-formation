<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>01 - entrainement PHP</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 fst-italic text-center my-4">01 - entrainement PHP</h1>
        <!-- Tout d'abord, nous pouvons écrire du HTML dans un fichier ayant l'extension PHP, l'inverse n'est pas possible -->
        <!-- Pour accéder à notre projet PHP sur le naviagteur, nous devons passer par le serveur local XAMPP qui interprète le code PHP, taper localhost ou 127.0.0.1 dans l'URL qui correspond à l'adresse http du serveur local XAMPP -->
        <!-- Tout les projets doivent être placés dans le dossier 'htdocs' du serveur local XAMPP -->

        <h2>Ecriture et affichage</h2><hr>

        <?php 
        // ouverture de la balise PHP
        // Il est possible d'ouvrir/fermer les balises PHP autant de fois que souhaité

        // Chaque instruction se termine toujours par un point virgule ';', c'est le délimiteur
        echo 'Bonjour'; // 'echo' est une instruction d'affichage que l'on peux traduire par 'affiche moi'

        echo '<br>'; // Nous pouvons également y mettre du HTML
        echo 'Bienvenue'; // Si vous vous rendez dans le code-source, vous ne verrez pas le PHP car le langage est interprété par le serveur

        echo '<h2 class="mt-5">Commentaire</h2><hr>';

        echo 'Texte'; // ceci un commentaire sur une seule ligne 
        echo 'Texte'; /* ceci est un commntaire
        sur plusieurs lignes
        */
        echo 'Texte'; # ceci est un commentaire sur une seule ligne

        echo '<h2 class="mt-5">Variable : type / déclaration / Affectation</h2><hr>';

        // Une variable est un espace nommé permettant de conserver une valeur 
        // Décalration d'une varaible toujours avec le signe $
        // $2a --> /!\ errreur !! | $a2 --> ok !!
        // caractères autorisés : a à z | A à Z | 0 à 9 | _
        // pas d'accents, pas d'espaces 

        // gettype() : fonction prédéfinie (prochain chapitre) permettant d'afficher le type d'une variable
        // Affectation de la valeur 127 à la variable nommée 'a'
        $a = 127;
        echo gettype($a); // un entier, type : INTEGER 
        echo '<br>';

        $b = 1.5;
        echo gettype($b); // un nombre à virgule, type : DOUBLE
        echo '<br>';

        $c = 'une chaine de caractères';
        echo gettype($c); // un chaine de caractères, type : STRING
        echo '<br>';

        $d = '127';
        echo gettype($d); // nous ne regardons la valeur de la variable mais sont type : STRING
        echo '<br>';

        $e = true; // ou false 
        echo gettype($e); // type BOOLEAN
        echo '<br>';

        // il reste 2 autres types, les ARRAY et les OBJETS

        echo '<h2 class="mt-5">Concaténation</h2><hr>';

        $x = 'bonjour ';
        $y = 'tout le monde';

        echo $x . $y . '<br>'; // point de concaténation que l'on peux traduire par 'suivi de'
        echo "$x $y <br>"; // entre guillemets, les variables sont bien interprétées / évaluées
        echo '$x $y <br>'; // entre simple quote, les variables ne sont pas interprétées / évaluées, c'est une chaine de caractères
        echo 'ajourd\'hui'; // entre simple quote, si la chaine de caractères contient une apostrophe, il faut utiliser le caractère d'échappement '\'

        echo '<h2 class="mt-5">Concaténation lors de l\'affectation</h2><hr>';

        $prenom = 'Nicolas ';
        $prenom .= 'Marie'; // Affectation de la valeur 'Marie' sur la variable : $prenom, cela ajoute SANS remplacer la valeur précedente grace à l'opérateur '.='
        // pratique pour stocker plusieurs messages utilisateur dans une seule variable plutôt que déclarer pllusieurs variables
        echo $prenom . '<br>';

        echo '<h2 class="mt-5">Constante et constante magique</h2><hr>';

        // Une constante toute comme une variable permet de conserver une valeur mais comme son nom l'indique, elle est CONSTANTE !!
        
        // define() : fonction prédéfinie permettant de déclarer une constante en PHP procédural
        // arguments define("NOM_CONSTANTE", "valeur_constante")
        // Par convention, une constante se délare toujours en MAJUSCULE
        define("CAPITALE", "Paris");
        echo CAPITALE . '<br>'; // affichage de la constante

        // define("CAPITALE", "Rome"); // /!\ erreur !! Warning: Constant CAPITALE already defined

        // Constante magique : prédéfinie dans le code PHP
        echo __FILE__ . '<br>'; // Chemin complet vers le fichier
        echo __LINE__ . '<br>'; // affiche le numéro de la ligne où a été executée la constante magique

        echo '<h2 class="mt-5">Exercice variable</h2><hr>';

        // Exo : Afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable, chaque mot doit être de la bonne couleur (le mot vert doit être de couleur vert)

        $vert = '<span class="text-success">vert</span>';
        $jaune = '<span class="text-warning">jaune</span>';
        $rouge = '<span class="text-danger">rouge</span>';

        echo $vert . '-' . $jaune . '-' . $rouge . '<br>';
        echo "$vert-$jaune-$rouge<br>";

        echo '<h2 class="mt-5">Opérateurs arithmétiques</h2><hr>';

        $a = 10; $b = 2;
        echo $a + $b . '<br>'; // affiche 12
        echo $a - $b . '<br>'; // affiche 8
        echo $a * $b . '<br>'; // affiche 20 
        echo $a / $b . '<br>'; // affiche 5
        echo $a % $b . '<hr>'; // affiche 0

        // opération / affectation 
        $a += $b; // equivaut à $a = $a + $b
        echo $a . '<br>'; // affiche 12
        $a -= $b; // equivaut à $a = $a - $b
        echo $a . '<br>'; // affiche 10
        $a *= $b; // equivaut à $a = $a * $b
        echo $a . '<br>'; // affiche 20
        $a /= $b; // equivaut à $a = $a / $b
        echo $a . '<br>'; // affiche 10

        // pratique pour le calcul d'un panier

        echo '<h2 class="mt-5">Structures conditionnelles (if/else) - opérateurs de comparaisons</h2><hr>';

        /*
            OPERATEURS DE COMPARAISON
            =           égal à
            ==          comparaison de la valeur
            ===         comparaison de la valeur et du type
            <           strictement inférieur
            >           strictement supérieur
            <=          inférieur ou égal à 
            >=          supérieur ou égal à 
            !           n'est pas 
            !=          différent de 
            OR ||       OU 
            AND &&      ET 
            XOR         OU exclusif
        */

        // Isset & Empty 

        $var1 = 0;
        $var2 = '';

        // empty : retourne TRUE si une variable contient 0 (ou false), si elle est vide ou non définie 
        if(empty($var1))
        {
            echo "0, vide ou non définie<br>";
        }
        // Pratique pour contrôller si un champ de formulaire est laissé vide ou non

        // Isset : test l'existence d'une variable, si elle est définie, elle retourne TRUE si la varaible est définie
        if(isset($var2))
        {
            echo "var2 exsiste et est définie par rien<br>";
        }

        // if / else / elseif 
        $a = 10; $b = 5; $c = 2;

        // Si la condition dans les parenthèses du IF retourne TRUE, alors on entre dans les accolades et le code s'execute
        // 10 > 5
        if($a > $b)
        {
            echo "A est bien supérieur à B<br>";
        }
        else // SINON... dans tous les autres cas, si lacondition IF retourne FALSE, on tombe dans le cas ELSE, le cas par défaut et le code entre les accolades s'execute
        {
            echo "Non c'est B qui est supérieur à A<br>";
        }

        // le cas ELSE n'est pas indispensable
        // else($b == 10) --> /!\ erreur !!!! il n'est pas possible d'ajouter une condition au cas ELSE

        // if / elseif / else 
        $a = 10; $b = 5; $c = 2;

        // 10   5     5    2
        if($a > $b && $b > $c)
        {
            echo "OK pour les 2 conditions<br>";
        }
        elseif($b == 5) // le == permet de comparer la valeur d'une variable
        {
            echo "B est égal à 5<br>";
        }
        else 
        {
            echo "tout le monde a faux ! <br>";
        }

        // ELSEIF permet d'ajouter des cas supplémentaires à la condition 
        // Si un des cas est vérifié, retourne TRUE, tous les cas suivants ne seront pas évalués

        // Forme contractée : condition ternaire (2ème possiblité d'écriture du if)
        $c = ($a == 10) ? "A est égal à 10<br>" : "A n'est pas égal à 10<br>";
        echo $c . '<br>';
        // le ? remplace le IF 
        // les ':' remplace le ELSE 
        // il est possible avec cette écriture de stocker la condition dans une variable

        $c = ($a == 10) ? "A est égal à 10<br>" : (($a == 10) ? "A n'est pas égal à 10<br>" : 'test');

        echo '<h2 class="mt-5">Condition SWITCH</h2><hr>';

        $perso = 'Mario';
        switch($perso)
        {
            case 'Luigi':
                echo "C'est Luigi le meilleur<hr>";
            break;
            case 'Toad':
                echo "C'est Toad le meilleur<hr>";
            break;
            case 'Bowser':
                echo "C'est Bowser le meilleur<hr>";
            break;
            default: 
                echo "Vous êtes fou c'est Mario le meilleur !!<br>";
        }
        // La condition SWITCH permet de comparer une valeur à différents cas potentiels 
        // les 'case' représente les cas dans lesquel nous pouvons potentiellement tomber
        // default : le cas par défaut n'est pas indispensable
        // break : permet de terminer la condition SWITCH si nous entrons dans un des cas

        // Exo : pouvez-vous faire la même chose que le SWITCH mais avec des if/elseif/else ? si oui, faites le.

        $perso = 'Mario';
        if($perso == 'Luigi')
            echo "C'est Luigi le meilleur<hr>";
        elseif($perso == 'Toad')
            echo "C'est Toad le meilleur<hr>";
        elseif($perso == 'Bowser')
            echo "C'est Bowser le meilleur<hr>";
        else 
            echo "Vous êtes fou c'est Mario le meilleur !!<br>";

        // Si il n'y a qu'une seule instruction dans les conditions IF, les accolades ne sont pas necéssaires

        echo '<h2 class="mt-5">Fonctions prédéfinies</h2><hr>';

        // Une fonction prédéfinie permet de réaliser un traitement spécifique, elles sont prédéfinies dans le langage et accessible de partout
        // Vous pouvez les consulter ici https://www.php.net/manual/fr/indexes.functions.php
        // Une fonction s'appel toujours avec des parenthèses puisqu'elle peut potentiellement recevoir des arguments

        // La fonction date() formate une date / heure locale
        // Les paramètres transmit à la fonction ne sortent pas de null part, voir la documentation
        echo "Date : <span class='badge bg-success'>" . date('d/m/Y') . "</span>";

        echo '<h2 class="mt-5">Fonctions prédéfinies : traitement des chaines (iconv_strlen, strpos, substr)</h2><hr>';

        // strpos : string position
        $email1 = 'gregorylacroix78@gmail.com';
        echo "Postion de l'@ dans la chaine : <span class='badge bg-success'>" . strpos($email1, '@') . "</span><br>";

        $email2 = 'bonjour';
        echo "Postion de l'@ dans la chaine : <span class='badge bg-success'>" . strpos($email2, '@') . "</span><br>"; // cette ligne ne sort rien, normal, il n'y a pas d'@ dans la chaine, pourtant la fonction retourne quand même quelque chose : FALSE !!

        // Grace au var_dump() on aperçoit le FALSE si le caractère "@" n'est pas trouvé. var_dump() est donc une instruction d'affichage améliorée que l'on utilise régulièrement en phase de développement. Il en exite un autre print_r()
        var_dump(strpos($email2, '@'));
        echo '<br>';
        /*
            strpos : fonction prédéfinie permettant de trouver la position d'un caractère dans une chaine 
            Succès : INT 
            Echec : Bollean FALSE 
            arguments : 
            1. Nous devons lui fournir la chains dans laquelle nous souhaitons chercher
            2. nous devons lui fournir l'information à chercher
        */

        // iconv_strlen : international conversion string lenght
        $phrase = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores, labore";
        echo "Taille de la chaine de caractères : <span class='badge bg-success'>" . iconv_strlen($phrase) . "</span><br>";

        // iconv_strlen() : fonction prédéfinie permettant de calucler la taille d'une chaine de caractères 
        // Nous pourrons l'utiliser pour savoir si le pseudo et le mdp lors d'une inscription ont des tailles conforme.

        // substr : substract a portion
        $texte = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo molestiae, quibusdam omnis nobis illum adipisci. Voluptate maxime asperiores facere placeat cupiditate eveniet architecto cumque possimus deleniti sit laboriosam harum facilis similique illo, pariatur dignissimos! Officiis accusantium magni aspernatur nisi! Velit!";

        echo substr($texte, 0, 20) . "...<a href=''>Lire la suite</a>";

        /*
            substr() : fonction prédéfinie permettant de retourner un segment de la chaine de caractères
            Succès : string 
            Echec : boolean FALSE 
            arguments : 
            1. La chaine que l'on souhaite couper
            2. La position de départ
            3. Le nombre de caractères souhaités
        */

        echo '<h2 class="mt-5">Fonctions utilisateur</h2><hr>';

        // Les fonction utilisateur permettent d'encapsuler une portion de code afin d'éviter les redondances dans le code, si nous avons un code que nous copions/collons sur chaque page, il serait préférable de prévoir une fonction utilisateur

        // Une fonction se décalre toujours avec le mot clé 'function' suivi du nom de la fonction que nous définissons, ne pas oublier les parenthèses puisqu'une fonction peut potentiellement recevoir des arguments

        // fonction sans argument 
        function separation()
        {
            echo "<hr><hr><hr>"; // instructions données à la fonction
        }

        separation(); // execution de la fonction 

        // fonction avec argument 
        //             Mickael
        function bonjour($qui = 'Ludovic') // il est possible d'affecter une valeur par défaut à la variable de reception
        {
            // $qui ne sort pas de null. C'est une variable qui recptionne l'argument transmit à la fonction à l'execution. Cette variable est déclarée entre les parenthèses
            //          Mickael
            echo "Bonjour $qui ! Comment vas-tu ?<br>";
        }

        bonjour("Mickael");
        $prenom = 'Mohamed';
        bonjour($prenom); // l'argument peut aussi être une variable
        bonjour(); // pas d'argument puisque la variable $qui a une valeur par défaut
        bonjour('Grégory'); // l'arguement 'Grégory' va écraser la valeur par défaut de la variable $qui

        //#######################################################

        // function calcul($nb)
        // {
        //     if($nb > 10)
        //         $r = $nb + 10;
        //     elseif($nb < 10)
        //         $r = $nb - 10;
        //     else 
        //         $r = 20; 

        //     return $r;
        // }

        // return retourne les instructions de la fonction, une fois executée on quitte la focntion

        function appliqueTva($nombre)
        {
            return $nombre*1.2;
            echo 'Allo!'; // cette ligne ne sort pas puisqu'il y a un 'return' dans la fonction
        }
        
        echo "500€ avec un taux de TVA de 20% : <span class='badge bg-success'>" . appliqueTva(500) . "€</span><hr>";

        // Pourriez vous améliorer cette fonction afin que l'on puisse calculé un nombre avec le taux de notre choix ? si oui, faites le.
        function appliqueTva2($nombre, $taux = 20)
        {
            return $nombre*(1+$taux/100);
        }

        echo "500€ avec un taux de TVA de 20% : <span class='badge bg-success'>" . appliqueTva2(500) . "€</span><br>";
        echo "500€ avec un taux de TVA de 19.6% : <span class='badge bg-success'>" . appliqueTva2(500, 19.6) . "€</span><br>";
        echo "500€ avec un taux de TVA de 7% : <span class='badge bg-success'>" . appliqueTva2(500, 7) . "€</span><hr>";

        // #########################################################
        echo meteo('automne', 15); // il est possible d'executer une fonction avant qu'elle ne soit déclarée dans le code

        // On précise en amont le type obligatoire des valeurs entrante dans les arguements
        //                   'automne'         15
        function meteo(string $saison, int $temperature): string // on précise en amont la valeur de retour que doit ressortir la fonction
        {
            //                     'automne'              15
            return "Nous sommes en $saison et il fait $temperature degré(s)<br>";
        }

        // Exo : gérer le 's' de degré en fonction de la temperature (singulier / pluriel), pensez à gérer l'article : 'en été | au printemps'

        function exoMeteo(string $saison, int $temperature): string
        {
            // temperature 
            if($temperature > 1 || $temperature < -1)
                $s = 's';
            else 
                $s = '';

            // saison
            if($saison == 'printemps')
                $art = 'au';
            else 
                $art = 'en';

            return "Nous sommes $art $saison et il fait $temperature degré$s<br>";
        }

        echo '<hr>';
        echo exoMeteo('été', 0);
        echo exoMeteo('automne', 1);
        echo exoMeteo('hiver', -1);
        echo exoMeteo('printemps', 2);
        echo exoMeteo('été', -2);

        echo '<h2 class="mt-5">Portée des variables / espace local et global</h2><hr>';

        function jourSemaine(): string
        {
            // ESPACE LOCAL

            $jour = "Jeudi"; // Variable LOCALE uniquement accessible dans la fonction
            return $jour;
        }

        // echo $jour; // Warning: Undefined variable $jour | variable non définie car cette variable n'est connue qu'à l'intérieur de la fonction
        $recup = jourSemaine(); // on récupère le résultat de la fonction 
        echo $recup . '<br>'; 

        // Il n'est pas possible d'exporter une variable LOCALE (dans une fonction) vers l'espace GLOBAL (à l'extérieur d'une fonction, espace par défaut)

        //###############################################################

        $pays = 'France'; // variable GLOBALE
        function affichagePays()
        {
            global $pays; // le mot clé 'global' permet d'importer une variable GLOABLE (déclarée à l'extérieur de la fonction) vers l'espace LOCAL (à l'intérieur de la fonction)
            echo $pays;
        }
        affichagePays();

        echo '<h2 class="mt-5">Structure itérative : les boucles</h2><hr>';

        echo '<h4>Boucle WHILE</h4>';

        $i = 0; // 5 | initialisation / point de départ 

        // Tant que la condition retourne TRUE, la boucle continue de tourner
        //    5
        while($i < 5)
        {
            // Instruction pour chaque tour de boucle
            echo "$i---";
            $i++; // incrémentation, équivaut à $i = $i + 1
            // Si on oublie l'incrémentation, la condtion du WHILE est toujours TRUE et la boucle tourne à l'infini !
        }
        echo '<br>';

        // 0---1---2---3---4---

        // Exo : faites en sorte de ne pas avoir les tirets à la fin : 0---1---2---3---4

        $j = 0;
        while($j < 5)
        {
            // On entre dans le IF au dernier tour de boucle
            if($j == 4)
                echo $j;
            else // Sinon... on entre dans le ELSE quand $i vaut 0,1,2 et 3
                echo "$j---";

            $j++;
        }

        echo '<h4>Boucle FOR</h4>';

        for($i = 0; $i < 16; $i++) // valeur de départ / condition d'entrée / sens (incrémentation / décrémentation)
        {
            echo "$i<br>"; // instrcution pour chaque tour de boucle
        }

        // Exo : réaliser un selecteur de 30 options via une boucle FOR

        echo '<select class="form-control">';
            echo '<option>1</option>';
            echo '<option>2</option>';
            echo '<option>3</option>';
            echo '<option>4</option>';
            echo '<option>5</option>';
        echo '</select><hr>';

        echo '<select class="form-control">';
        for($k = 0; $k <= 30; $k++)
        {
            echo "<option>$k</option>";
        }
        echo '</select><hr>';

        // fermeture de la balise PHP
        ?>

        <!-- 
        if(): / elseif(): / endif;
        while(): / endwhile; 
        for(): / endfor;
        foreach(): / endforeach;

        les deux points ':' remplace l'accolade ouvrante
        endfor remplace l'accolade fermante
        -->

        <div class="col-md-1">
            <select class="form-control">
            <?php for($k = 0; $k <= 30; $k++): ?>

                <!-- <option><?php echo $k; ?></option> -->
                <option><?= $k ?></option><!-- raccourci : remplace un echo  -->

            <?php endfor; ?>
            </select>
        </div><hr>

        <?php 
        // Exo : Faites une boucle de 0 à 9 sur la même ligne (soit 10 tours) dans un tableau HTML 

        echo '<table class="table table-bordered">';
            echo '<tr>'; // une ligne du tableau 
                echo '<td>1</td>'; // une cellule du tableau
                echo '<td>2</td>'; // une cellule du tableau
                echo '<td>3</td>'; // une cellule du tableau
            echo '</tr>';
        echo '</table><hr>';

        /*
            -----------------------------------------
            | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |
            -----------------------------------------
        */

        echo '<table class="table table-bordered text-center"><tr>';
        for($l = 0; $l < 10; $l++)
        {
            echo "<td>$l</td>";
        }
        echo '</tr></table><hr>';

        // Exo : Faire le même chsoe en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles

        /*
            boucle imbriquée

            for() // tourne 10 fois pour créer 10 lignes <tr> du tableau
            {
                for() // tourne 10 fois pour créer 10 cellules <td> sur chaque ligne <tr> du tableau
                {

                }
            }

            0	1	2	3	4	5	6	7	8	9
            10	11	12	13	14	15	16	17	18	19
            20	21	22	23	24	25	26	27	28	29
            30	31	32	33	34	35	36	37	38	39
            40	41	42	43	44	45	46	47	48	49
            50	51	52	53	54	55	56	57	58	59
            60	61	62	63	64	65	66	67	68	69
            70	71	72	73	74	75	76	77	78	79
            80	81	82	83	84	85	86	87	88	89
            90	91	92	93	94	95	96	97	98	99
        */

        $compteur = 0; // 10
        echo '<table class="table table-bordered text-center">';
        //           1      1
        for($ligne = 0; $ligne < 10; $ligne++)
        {
            echo '<tr>';
            //             0       0
            for($cellule = 0; $cellule < 10; $cellule++)
            {
                //          10
                echo "<td>$compteur</td>";
                $compteur++;
            }
            echo '</tr>';
        }
        echo '</table><hr>';

        /*
            | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |
            | 10|
        */

        echo '<table class="table table-bordered text-center"><tr>';
        for($i = 0; $i < 100; $i++)
        {
            if($i%10 == 0)
            {
                echo '</tr><tr>';
            }
            echo "<td>$i</td>";
        }
        echo '</table>';

        echo '<h2 class="mt-5">Les tableaux de données ARRAY</h2><hr>';

        // un tableau ARRAY est déclaré un peu comme une variable améliorée, car on ne conserve pas qu'une valeur mais un ensemble de valeur

        // Les [] permettent de créer un tableau de données ARRAY, entre les crochets nous listons toute les données du tableau
        $perso = ['Mario', 'Toad', 'Bowser', 'Luigi', 'Peach'];

        // echo $perso; // /!\ Warning: Array to string conversion | il n'est pas possible de convertir en chaine de caractères en passant par un 'echo'

        // Les instructions d'affichage améliorée var_dump() et print_r() permettent de voir le contenu du tableau ARRAY, ce sont des outils de debug et non un affichage conventionnel 'echo'
        echo '<h4>var_dump</h4>';
        echo '<pre>'; var_dump($perso); echo '</pre>';

        echo '<h4>print_r</h4>';
        echo '<pre>'; print_r($perso); echo '</pre>';

        /*
            Tableau de données ARRAY associatif car il y a toujours un indice associé à une valeur dans le tableau
            Array
            (
              indice   valeur
                [0] => Mario
                [1] => Toad
                [2] => Bowser
                [3] => Luigi
                [4] => Peach
            )

            Exo : tenter d'afficher 'Bowser' sur la page Web en passant par le tableau ARRAY $perso sans faire un "echo Bowser"
        */

        echo $perso[2] . '<br>';

        echo '<h4>Boucle FOREACH pour les tableaux de données ARRAY</h4>';
        
        // La boucle FOREACH est un moyen simple de passer en revue un tableau de données ARRAY
        // $valeur est une variable de reception, que nous définissons et nommons dans la boucle FOREACH, elle receptionne une valeur du tableau ARRAY par tour de boucle FOREACH
        // as fait partie du langage et est obligatoire
        // Une fois toute les valeurs parcouru, la boucle FOREACH s'arrete
        foreach($perso as $valeur)
        {
            echo "$valeur<br>"; // instruction pour chaque tour de boucle, on affiche successivement les valeurs du tableau ARRAY
        }

        echo '<hr>';

        /*
            Si il y a 2 variables déclarés dans la boucle FOREACH, l'une parcours la colonne des indices ($indice) et l'autre parcours la colonne des valeurs ($valeur)
        */

        // 1er tour       0           Mario
        // 2ème tour      1           Toad
        // 3ème tour etc.... 
        foreach($perso as $indice => $valeur)
        {
            echo "$indice : $valeur<br>"; // on affiche successivement l'indice en focntion de la valeur pour chaque tour de boucle foreach
        }

        /*
            Array
            (
                      $valeur
                [0] => Mario
                [1] => Toad
                [2] => Bowser
                [3] => Luigi
                [4] => Peach
            )
        */

        echo '<hr>';

        // Il est possible de définir les indices du tableau ARRAY
        $couleur = [
            'j' => 'jaune',
            'v' => 'vert',
            'r' => 'rouge',
            'b' => 'bleu'
        ];

        echo '<pre>'; print_r($couleur); echo '</pre>';

        // count et sizeof retourne le nombre d'éléments stockés dans un ARRAY, pas de différence entre les 2.
        echo "Taille du tableau ARRAY :  <span class='badge bg-success'>" . count($couleur) . "</span><br>";
        echo "Taille du tableau ARRAY :  <span class='badge bg-info'>" . sizeof($couleur) . "</span><hr>";

        //implode() est une fonction prédéfinie qui rassemble les éléments d'un tableau ARRAY en une chaine de caractère (séparé par un symbole). L'inverse : explode()
        echo implode("-", $perso);

        echo '<h4>Tableau ARRAY multidimensionnel</h4>';
        // Nous parlons de tableaux multidimensionnel lorsqu'un tableau est contenu dans un autre tableau

        $tabMulti = [
            0 => [
                'prenom' => 'Julien',
                'nom' => 'Cottet'
            ],
            1 => [
                'prenom' => 'Mickael',
                'nom' => 'Ajinca'
            ]
        ];

        echo '<pre>'; print_r($tabMulti); echo '</pre>';

        /*
            Array
            (
                [0] => Array
                    (
                        [prenom] => Julien
                        [nom] => Cottet
                    )

                [1] => Array
                    (
                        [prenom] => Mickael
                        [nom] => Ajinca
                    )

            )

            Exo : tenter d'afficher 'Mickael' sur la page Web en passant par le tableau multidimensionnel $tabMulti sans faire un "echo 'Mickael'"
        */

        echo $tabMulti[1]['prenom'] . '<hr>';

        // Exo : afficher successivement toute les données du tableau ARRAY à l'aide de boucle foreach (indice : boucle imbriquée)

        //                   0       ARRAY
        foreach($tabMulti as $key => $tab)
        {
            //     ARRAY    prenom     Julien
            foreach($tab as $indice => $valeur)
            {
                echo "$indice : $valeur<br>";
            }
            echo '<hr>';
        }

        echo '<hr>';

        //          1   < 2
        for($i = 0; $i < count($tabMulti); $i++)
        {
            //      $tabMulti[1]
            foreach($tabMulti[$i] as $indice => $valeur)
            {
                echo "$indice : $valeur<br>";
            }
        }

        echo '<h2 class="mt-5">Les superglobales</h2><hr>';

        /*
            Les supergloables sont des variables prédéfinies, de type ARRAY, accessible de partout (espace local et global) permettant de véhiculer certains types de données
            Elles s'appellent toujours avec un '_' suivi du nom de la superglobale en MAJUSCULE

            $_SERVER : véhicule des informations lié au serveur
            $_GET : véhicule les données transmises dans l'URL
            $_POST : véhicule les données saisie via un formulaire
            $_FILES : véhicule les données d'un fichier uplodé
            $_SESSION : véhicule les informations lié à une session en cours
            $_COOKIE : véhicule les données lié à un fichier de cookie
            $_REQUEST : retourne un tableu associatif contenant les superglobales $_GET, $_POST et $_COOKIE
        */

        echo '<pre>'; print_r($_SERVER); echo '</pre>';

        ?>

    </div>
</body>
</html>