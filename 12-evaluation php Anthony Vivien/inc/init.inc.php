<?php 


$bdd = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_anthony', 'root', '', 
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);



foreach($_POST as $key => $value)
{
    if($key != 'description')
        $_POST[$key] = htmlspecialchars(strip_tags(trim($value)));
}

foreach($_GET as $key => $value)
{
    $_GET[$key] = htmlspecialchars(strip_tags(trim($value)));
}

?>