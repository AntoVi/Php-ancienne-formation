<?php 
//              'cerises', 500
function calcul($fruit, $poids)
{
    //    'cerises'
    switch($fruit)
    {
        //                  
        case 'cerises': $prix_kg = 5.76; break;
        case 'bananes': $prix_kg = 1.09; break;
        case 'pommes': $prix_kg = 1.61; break;
        case 'peches': $prix_kg = 3.23; break;
        default: return "Fruit inexistant"; 
    }

    //          500   * 5.76
    $r = round(($poids*$prix_kg/1000),2); // gramme*prix/1000

    //          cerises       2.88       500
    return "Les $fruit coutent $r € pour $poids grammes<br>";
}

// Test fonction : 
// echo calcul('cerises', 500);
// echo calcul('pommes', 1500);
// echo calcul('ezfzefzefzefzef', 500);
