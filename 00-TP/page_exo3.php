<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> GET- boutique </title>
</head>
<body>
    <div class="container">
    <h1 class="display-4 text-center fst-italic my-4"> Restaurant </h1>
    
    <?php
    if(isset($_GET['pizza']) &&isset($_GET['salade']) && isset($_GET['poisson']) && isset($_GET['viande']))
    echo '<div class="col-md-3 mx-auto text-center alert alert-success mb-3">';
    {
        
        foreach($_GET as $key => $value)
        {
            
            echo "$key : $value<br>";
            

        }
      
    }
    echo "</div>";
?>
    


        
    </div>
</body>
</html>