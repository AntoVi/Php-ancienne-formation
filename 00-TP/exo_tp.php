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

    <?php
   echo "<h1 class='display-4 text-center fst-italic'>Formulaire 1</h1><hr>";

   if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) 
   && isset($_POST['code_postal']) && isset($_POST['sexe']) && isset($_POST['description']))

   {
       foreach($_POST as $key => $value)
       
       {
        echo '<div class="col-md-2  alert alert-danger text-center">';
           echo "$key : $value<br>";
           echo '</div>';
       }
      
   }
   

   ?>

        

        <form method="post" class="col-md-6 mt-3">
            <div>
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" class="form-control" name="nom"> 
            </div>
            <div>
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" id="prenom" class="form-control">
            </div>
            <div>
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text " id="adresse" class="form-control" name="adresse">
            </div>
            <div>
                <label for="ville" class="form-label">Ville</label>
                <input type="text" name="ville" id="ville" class="form-control">
            </div>
            <div>
                <label for="code_postal" class="form-label">code postal</label>
                <input type="text" name="code_postal" id="code_postal" class="form-control">
            </div>
            <div>
                <label for="sexe" class="form-label">sexe</label>
               <select name="sexe" id="sexe" class="form-select">
                   <option value="femme">femme</option>
                   <option value="homme">homme</option>
               </select>
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button class="btn btn-danger mt-2"> Envoyer</button>

        </form>

        <?php
echo "<h1 class='display-4 text-center fst-italic'>Formulaire 2</h1><hr>";

if(isset($_POST['titre']) && isset($_POST['couleur']) && isset($_POST['taille']) && isset($_POST['poids']) 
   && isset($_POST['prix']) && isset($_POST['description_produit']) && isset($_POST['stock']) && isset($_POST['fournisseur']))
   {
       foreach($_POST as $key2 => $value2)
       {
           echo "$key2 : $value2<br>";
       }
   }



        ?>  
        <h4 class="text-center">Choissiez votre produit</h4>
        <form method="post" class="col-md-6">
            <div>
                <label for="titre" class="form-label">titre</label>
                <input type="text" id="titre" class="form-control" name="titre"> 
            </div>
            <div>
                <label for="couleur" class="form-label">Couleur</label>
                <input type="text" name="couleur" id="couleur" class="form-control">
            </div>
            <div>
                <label for="taille" class="form-label">Taille</label>
                <input type="text " id="taille" class="form-control" name="taille">
            </div>
            <div>
                <label for="poids" class="form-label">Poids</label>
                <input type="text" name="poids" id="poids" class="form-control">
            </div>
            <div>
                <label for="prix" class="form-label">Prix</label>
                <input type="text" name="prix" id="prix" class="form-control">
            </div>
            <div>
                <label for="description_produit" class="form-label">Description</label>
                <textarea name="description_produit" id="description_produit" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div>
                <label for="stock" class="form-label">Stock</label>
                <input type="text" name="stock" id="stock" class="form-control">
            </div>

            <div>
                <label for="fournisseur" class="form-label">Fournisseur</label>
                <input type="text" name="fournisseur" id="fournisseur" class="form-control">
            </div>
            
            <button class="btn btn-danger col-md-8 mt-2"> Envoyer</button>

        </form>
       

       

    </div>
</body>
</html>