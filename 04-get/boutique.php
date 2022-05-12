<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>04 - GET - boutique</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center fst-italic my-4">Boutique</h1>

        <div class="col-md-12 d-flex justify-content-around flex-wrap">

            <div class="card col-md-5 mb-4">
                <img src="https://picsum.photos/200/100" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produit 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <!-- 
                        <a href="url_destination?indice=valeur&indice=valeur&indice=valeur"></a>
                        le ? permet de délimiter l'url de destination et les paramètres transmit dans l'URL 
                    -->
                    <a href="fiche_produit.php?id=1&article=jean&couleur=bleu&prix=45" class="btn btn-primary">En savoir plus</a>

                </div>
            </div>

            <div class="card col-md-5 mb-4">
                <img src="https://picsum.photos/200/100" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produit 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    <a href="fiche_produit.php?id=2&article=pull&couleur=rouge&prix=30" class="btn btn-primary">En savoir plus</a>

                </div>
            </div>

            <div class="card col-md-5 mb-4">
                <img src="https://picsum.photos/200/100" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="fiche_produit.php?id=3&article=tee-shirt&couleur=vert&prix=15" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>

            <div class="card col-md-5 mb-4">
                <img src="https://picsum.photos/200/100" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Produit 4</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="fiche_produit.php?id=4&article=manteau&couleur=noir&prix=50" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>