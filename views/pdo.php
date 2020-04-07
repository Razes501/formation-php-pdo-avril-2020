<h2><?=$pageTitle?></h2>

<form method="post" class="m-4">
    <div class="form-group">
        <label>Nom</label>
        <input type="text" class="form-control" name="personName"
        value="<?= $person["person_name"] ?? "" ?>">
    </div>
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" class="form-control" name="firstName"
        value="<?= $person["first_name"] ?? ""?>">
    </div>
    <div class="form-group">
        <label>Profession</label>
        <input type="text" class="form-control" name="profession"
        value="<?= $person["profession"] ?? ""?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary btn-block">
        Valider
    </button>
</form> 

    <ul>

        <?php foreach($personList as $person) : ?>
            <li> 
            <?= $person['person_name'] . ' ' . $person['first_name']?> 
            <a href="/?page=personDelete&id=<?= $person['id']?>" > Suppression du nom </a> 
            <a href="/?page=pdo&id=<?= $person['id']?>" > Modification du nom </a>             
            </li>
            
        <?php endforeach ?>

    </ul>
