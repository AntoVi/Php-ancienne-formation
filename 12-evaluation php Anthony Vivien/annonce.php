<?php

require_once 'inc/init.inc.php';


  if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['postal_code']) && isset($_POST['city']) && isset($_POST['type']) && isset($_POST['price']))
  {
      $data = $bdd->prepare("INSERT INTO advert (title, description, postal_code, city, type, price ) VALUES (:title, :description, :postal_code, :city, :type, :price)");
      $data->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
      $data->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
      $data->bindValue(':postal_code', $_POST['postal_code'], PDO::PARAM_STR);
      $data->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
      $data->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
      $data->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
      $data->execute();

      header('location: annonce.php');

      $msg = "L'annonce n <strong>$_GET[id]</strong> a été ajoutée avec succés";
  }


 
  require_once 'inc/header.inc.php';
 


?>



    


<?php if(isset($msg)):  ?>
    <p class="text-center text-white bg-info col-md-5 mx-auto p-3 my-3"><?=$msg; ?>

    </p>
<?php endif; ?>
 
    
    <div class="container">
    

        <h1 class="display-4 text-center fst-italic"> AJOUTER UNE ANNONCE  </h1>

        <form method="post"  class=" g-3 ">
        <div class="col-md-6">
            <label for="title" class="form-label">Titre de l'annonce</label>
            <input type="text" class="form-control" id="title" name="title" ">
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="col-md-6">
            <label for="postal_code" class="form-label">Code_postal</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" ">
        </div>
        <div class="col-md-6">
            <label for="city" class="form-label">ville</label>
            <input type="text" class="form-control" id="city" name="city" ">
        </div>
        <div class="col-md-6">
            <label for="type" class="form-label">Type d’annonce</label>
            <select name="type" id="type" class ="mt-2">
                <option value="location">Location</option>
                <option value="vente">Vente</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Prix</label>
            <input type="text" class="form-control" id="price"  name="price" ">
        </div>
      
        <div class="col-12">
            <button type="submit" class="btn btn-dark mt-4">
      
            Ajouter l'annonce
         
            </button>
        </div>
    </form>

    </div>

    
 

    
    
<?php

require_once 'inc/footer.inc.php';


 


?>

