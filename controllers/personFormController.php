<?php 
//Instance de PDO utilisée pour l'insertion d'une personne et 
//également pour la récupération de la liste des professions
$pdo = getPDO();


//Le formulaire a-t-il été envoyé ?
$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    //récupérer la saisie 
    $person = filter_input(INPUT_POST, "person", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

    //Insertion dans la base de données 

    //insertion de la personne
    
    $sql = "INSERT INTO persons (first_name, person_name, profession_id)
            VALUES (:firstName, :personName, :profession)";

    $statement = $pdo->prepare($sql);
    $statement->execute($person);

    //récupération de l'identifiant de la nouvelle personne
    $personId = $pdo->lastInsertId();

    //Insertion de l'adresse
    var_dump($address);
    $sql = "INSERT INTO adresses (address, zip_code, city, person_id)
            VALUES (:street, :zipCode, :city, :person_id)";

    //injection de l'id dans les données à passer à ma requête
    $address["person_id"] =$personId;

    $statement = $pdo->prepare($sql);
    $statement->execute($address);

    //rediction vers la liste des personnes
    header("location:/?page=personList");
}




//Récupération de la liste des professions
$sql = "SELECT id, profession_name FROM professions";
$request = $pdo->query($sql);
$professionList = $request->fetchAll();


//Affichage du formulaire
$pageTitle = "Nouvelle personne";
$content = "../views/personForm.php";

require "../views/baseLayout.php";