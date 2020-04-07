<?php 
//Inclusion de la configuration de l'application
require "../config.php";

//Inclusion de la librairie des outils de base de données
require "../libs/database.php";

//Récupération du controleur demandé
$controller = filter_input(INPUT_GET, "page") ?? "home";

//Constitution du chemin vers le fichier controleur
$url = "../controllers/{$controller}Controller.php";

//Si le fichier n'existe pas afficher un controleur d'erreur
if(! file_exists($url)){
    $errorMessage = "Contrôleur introuvable";
    $url = "../controllers/errorController.php";
}

//Execution du controleur
require $url;