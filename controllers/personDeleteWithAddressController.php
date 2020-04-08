<?php

//Récupération de l'identifiant de la personne à supprimer
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//récupérer une instance de pdo
$pdo = getPDO();

//Suppression des adresses
$sql = "DELETE FROM adresses WHERE person_id = ?";

//Préparation de la requête
$statement = $pdo->prepare($sql);

//Execution de la requête en passant le paramètre
$statement->execute([$id]);

//Suppression des de la personne
$sql = "DELETE FROM persons WHERE id = ?";

//Préparation de la requête
$statement = $pdo->prepare($sql);

//Execution de la requête en passant le paramètre
$statement->execute([$id]);

//redirection vers la liste des personnes
header("location:/?page=personList");