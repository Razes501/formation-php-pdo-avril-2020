<?php

//Récupération du paramètre
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

try {
    //instance de PDO 
    $pdo = getPDO();
    //Execution de la requête
    $pdo->exec("DELETE FROM persons WHERE id=$id");

    //Redirection vers la liste des personnes
    header("location:/?page=pdo");
    
}catch(PDOException $e){
    $pageTitle = "Erreur";
    $errorMessage = "Une erreur empêche la requête sur la base de données";
    $content = "../views/error.php";

    require "../views/baseLayout.php";
}